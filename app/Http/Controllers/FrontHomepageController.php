<?php

namespace App\Http\Controllers;

use App\Models\SongBook;
use Illuminate\Http\Request;

class FrontHomepageController extends Controller
{
    public function frontHomepage()
    {
        $all_newly_added_lyrics = SongBook::select('lyrics_id', 'lyrics_title', 'lyrics_worshipper_name', 'lyrics_words', 'lyrics_thumbnail', 'cat_name', 'song_books.created_at')->join('categories', 'lyrics_cat_id', '=', 'cat_id')->where('lyrics_status', '=', 1)->orderBy('song_books.created_at', 'desc')->limit(3)->get()->toArray();
        return view('main-homepage', compact('all_newly_added_lyrics'));
    }
}
