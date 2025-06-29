@extends('layouts.dashboard')

@section('title')
    Song Book
@endsection

@section('content-area')

    <div class="margin-top-25 song_book">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">🎵 Song Book</h4>
            <a href="{{ route('lyrics.add') }}" class="btn btn-outline-dark">
                <i class="fa-solid fa-plus me-1"></i> Add Song Lyrics
            </a>
        </div>

        <div class="table-responsive border rounded shadow-sm" style="max-height: 500px; overflow-y: auto;">
            <table class="table table-hover table-striped align-middle mb-0">
                <thead class="table-primary text-center">
                <tr>
                    <th>#</th>
                    <th>Song Title</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th width="220px">Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($all_lyrics as $lyrics)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $lyrics['lyrics_title'] }}</td>
                        <td>{!! $lyrics['cat_name'] !!}</td>
                        <td>{!! getStatusLabel($lyrics['lyrics_status']) !!}</td>
                        <td class="text-center">
                            <a href="{{ route('lyrics.view', $lyrics['lyrics_id']) }}" class="btn btn-sm btn-info me-1">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href="{{ route('lyrics.edit', $lyrics['lyrics_id']) }}" class="btn btn-sm btn-primary me-1">
                                <i class="fa fa-pen"></i>
                            </a>
                            <a href="{{ route('lyrics.delete', $lyrics['lyrics_id']) }}" class="btn btn-sm btn-danger"
                               onclick="return confirm('Are you sure you want to delete this song?')">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">No songs found.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
