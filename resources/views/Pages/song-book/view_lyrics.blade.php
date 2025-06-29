@extends('layouts.dashboard')

@section('title')
    View Lyrics
@endsection

@section('content-area')

    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">🎵 View Lyrics</h5>
                <a href="{{ route('lyrics.list') }}" class="btn btn-light btn-sm">
                    <i class="fa-solid fa-arrow-left me-1"></i> Back To Listing
                </a>
            </div>

            <div class="card-body">
                <div class="row gy-4">

                    <!-- Song Title -->
                    <div class="col-md-6">
                        <strong class="text-primary">Song Title:</strong>
                        <div class="h5">{{ $view_lyrics['lyrics_title'] }}</div>
                    </div>

                    <!-- Category -->
                    <div class="col-md-6">
                        <strong class="text-primary">Category:</strong>
                        <div class="h5">{{ $view_lyrics['cat_name'] }}</div>
                    </div>

                    <!-- Status -->
                    <div class="col-md-6">
                        <strong class="text-primary">Status:</strong>
                        <div>{!! getStatusLabel($view_lyrics['lyrics_status']) !!}</div>
                    </div>

                    <!-- Thumbnail -->
                    @if (!empty($view_lyrics['lyrics_thumbnail']))
                        <div class="col-md-6">
                            <strong class="text-primary">Thumbnail:</strong><br>
                            <img src="{{ asset('uploads/thumbnails/' . $view_lyrics['lyrics_thumbnail']) }}"
                                 alt="Thumbnail" class="img-fluid mt-2" style="max-height: 130px;">
                        </div>
                    @endif

                    <!-- Lyrics -->
                    <div class="col-md-12">
                        <strong class="text-primary">Lyrics:</strong>
                        <div>
                            {!! nl2br(e($view_lyrics['lyrics_words'])) !!}
                        </div>
                    </div>

                    <!-- Created At -->
                    <div class="col-md-6">
                        <strong class="text-primary">Created At:</strong>
                        <div class="text-danger">{{ $view_lyrics['created_at'] }}</div>
                    </div>

                    <!-- Updated At -->
                    <div class="col-md-6">
                        <strong class="text-primary">Updated At:</strong>
                        <div class="text-danger">{{ getDashOnEmpty($view_lyrics['updated_at']) }}</div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
