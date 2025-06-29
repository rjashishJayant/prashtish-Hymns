<?php

namespace App\Http\Controllers;

use App\Models\SongBook;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Collection;

class HomepageController extends Controller
{
    /**
     * Get recently uploaded lyrics.
     *
     * @return array<int, array{lyrics_id: int, lyrics_title: string}>
     */
    public function recentlyUploadedLyrics(): array
    {
        return SongBook::orderBy('created_at', 'desc')->get(['lyrics_id', 'lyrics_title'])->toArray();
    }
}
