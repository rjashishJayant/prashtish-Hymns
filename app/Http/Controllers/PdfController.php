<?php

namespace App\Http\Controllers;


use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class PdfController extends Controller
{
    /**
     * Generate and download PDF or redirect back on error.
     *
     * @param array{lyrics_title: string, lyrics_words: string} $someData
     * @return Response|RedirectResponse
     */
    public function generatePDF(array $someData):Response|RedirectResponse
    {
        if (!empty($someData['lyrics_title']) && !empty($someData['lyrics_words'])) {
            $pdf = Pdf::loadView('pages.lyrics-pdf', [
                'title' => $someData['lyrics_title'],
                'content' => mb_convert_encoding($someData['lyrics_words'], 'UTF-8', 'auto'),
            ]);
            $pdf->setOption('font', 'hindi');

            return $pdf->download('lyrics.pdf');
        } else {
            return redirect()->back()->with('error', 'Lyrics not found');
        }
    }

}
