@extends('layouts.dashboard')

@section('title')
    Home Page
@endsection

@section('content-area')
    <div class="margin-top-10 recently-uploaded-main" style="height: 568px;">
        <hr>
        <h4 class="margin-left-10">Recently Uploaded</h4>
        <hr>
        <div class="recently-uploaded">
            <div class="row justify-content-around">
                @foreach($all_recently_uploaded_lyrics AS $recently_lyrics)
                    <div class="col-md-5 recently-uploaded-box me-md-2">
                        <a href="{{route('lyrics.get', ['song_id'=>$recently_lyrics['lyrics_id']])}}">
                            {{$recently_lyrics['lyrics_title']}}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
