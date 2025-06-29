@extends('layouts.dashboard')

@section('title')
    Song Book
@endsection

@section('content-area')

    <div class="margin-top-25 song_book">
        <hr>
        <h4>Song Book <span class="float-end"><a href="{{route('lyrics.add')}}" class="btn btn-outline-dark"
                                                 style="margin-top: -10px; margin-right: 10px">Add Song Lyrics</a></span>
        </h4>
        <hr>
        <div style="height: 450px; overflow: auto">
            <table class="table table-striped table-bordered margin-top-25">
                <thead>
                <tr class="table-primary">
                    <th>#</th>
                    <th>Song Title</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th width="220px">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($all_lyrics AS $lyrics)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$lyrics['lyrics_title']}}</td>
                        <td>{!! $lyrics['cat_name'] !!}</td>
                        <td>{!! getStatusLabel($lyrics['lyrics_status']) !!}</td>
                        <td class="text-md-center">
                            <a href="{{route('lyrics.view',$lyrics['lyrics_id'])}}" class="btn btn-info">View</a>
                            <a href="{{route('lyrics.edit',$lyrics['lyrics_id'])}}" class="btn btn-primary">Edit</a>
                            <a href="{{route('lyrics.delete',$lyrics['lyrics_id'])}}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
