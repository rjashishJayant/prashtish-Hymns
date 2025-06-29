<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SongBook;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SongBookController extends Controller
{
    public function allLyrics(): View
    {
        $all_lyrics = SongBook::join('categories', 'song_books.lyrics_cat_id', '=', 'categories.cat_id')
            ->select('lyrics_id', 'lyrics_title', 'lyrics_status', 'cat_name')
            ->get()->toArray();
        return view('Pages.song-book.song_book', compact('all_lyrics'));
    }

    public function addLyrics(): View
    {
        $categories = Category::all('cat_id', 'cat_name')->toArray();
        return view('Pages.song-book.add_song', compact('categories'));
    }

    public function saveLyrics(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'song_name' => 'required|min:5|max:60',
            'category_id' => 'required',
            'lyrics_status' => 'required',
            'worshipper_name' => 'nullable|min:2|max:100',
            'lyrics' => 'min:2|required',
            'thumbnail' => 'required',
        ]);
        $current_date_time = date('Y-m-d H:i:s');
        $lyrics = new SongBook();
        $lyrics->lyrics_cat_id = $request->input('category_id');
        $lyrics->lyrics_title = $request->input('song_name');
        $lyrics->lyrics_status = $request->input('lyrics_status');
        $lyrics->lyrics_worshipper_name = $request->input('worshipper_name');
        $lyrics->lyrics_words = $request->input('lyrics');
        $lyrics->lyrics_thumbnail = $request->input('thumbnail');
        $lyrics->created_at = $current_date_time;
        $lyrics->save();

        if ($lyrics->lyrics_id) {
            return back()->with('success', 'Lyrics saved successfully');
        }
        return back()->with('error', 'Something went wrong');
    }

    public function viewLyrics(int $lyrics_id): View
    {
        $view_lyrics = SongBook::join('categories', 'song_books.lyrics_cat_id', '=', 'categories.cat_id')
            ->where('lyrics_id', '=', $lyrics_id)
            ->select('song_books.*', 'categories.cat_name')
            ->first();
        return view('Pages.song-book.view_lyrics', compact('view_lyrics'));
    }

    public function editLyrics(int $lyrics_id): View
    {
        $edit_lyrics_data = SongBook::where('lyrics_id', '=', $lyrics_id)->first();
        $categories = Category::all('cat_id', 'cat_name')->toArray();
        return view('Pages.song-book.add_song', compact('edit_lyrics_data', 'categories'));
    }

    public function updateLyrics(Request $request, int $lyrics_id): RedirectResponse
    {
        $this->validate($request, [
            'song_name' => 'required|min:5|max:60',
            'category_id' => 'required',
            'lyrics_status' => 'required',
            'worshipper_name' => 'nullable|min:2|max:100',
            'lyrics' => 'min:2|required',
            'thumbnail' => 'required',
        ]);
        $lyrics_update = SongBook::where('lyrics_id', '=', $lyrics_id)->first();
        $current_date = date('Y-m-d H:i:s');
        $type = $message = '';
        if ($lyrics_update) {
            $lyrics_update->lyrics_cat_id = $request->input('category_id');
            $lyrics_update->lyrics_title = $request->input('song_name');
            $lyrics_update->lyrics_status = $request->input('lyrics_status');
            $lyrics_update->lyrics_worshipper_name = $request->input('worshipper_name');
            $lyrics_update->lyrics_words = $request->input('lyrics');
            $lyrics_update->lyrics_thumbnail = $request->input('thumbnail');
            $lyrics_update->updated_at = $current_date;
            $lyrics_update->save();

            if ($lyrics_update->cat_id) {
                $type = 'success';
                $message = 'Lyrics updated successfully';
            }
        } else {
            $type = 'error';
            $message = 'Something went wrong!';
        }
        return back()->with($type, $message);
    }

    public function deleteLyrics(int $lyrics_id): RedirectResponse
    {
        $exist_lyrics = SongBook::where('lyrics_id', '=', $lyrics_id)->first();
        if ($exist_lyrics) {
            $exist_lyrics->delete();
            return back()->with('success', 'Lyrics has been deleted');
        } else {
            return back()->with('error', 'Lyrics not found');
        }
    }

    public function searchSong(Request $request): JsonResponse
    {
        $searched_term = $request->searched_term;
        $retval = '';
        $retval = SongBook::select('lyrics_id', 'lyrics_title')->where('lyrics_title', 'like', '%' . $searched_term . '%')->get()->toArray();
        if (!empty($retval)) {
            return response()->json($retval);
        }
        return response()->json($retval);
    }

    public function getLyrics(int $lyrics_id): View|RedirectResponse
    {
        if (!empty($lyrics_id)) {
            $lyrics = SongBook::select('lyrics_id', 'lyrics_title', 'lyrics_words')->where('lyrics_id', '=', $lyrics_id)->first();
            if (!empty($lyrics)) {
                return view('Pages.song-book.lyrics', compact('lyrics'));
            } else {
                return back()->with('error', 'Lyrics not found');
            }
        } else {
            return back()->with('error', 'Lyrics not found');
        }
    }


    public function downloadLyricsAsPdf(int $lyrics_id): Response|RedirectResponse
    {
        if (!empty($lyrics_id)) {
            $lyrics = SongBook::select('lyrics_id', 'lyrics_title', 'lyrics_words')->where('lyrics_id', '=', $lyrics_id)->get()->toArray();
            if (!empty($lyrics)) {
                return (new PdfController())->generatePDF($lyrics[0]);
            } else {
                return back()->with('error', 'Sorry! Something went wrong.');
            }
        } else {
            return back()->with('error', 'Lyrics not found');
        }
    }
}
