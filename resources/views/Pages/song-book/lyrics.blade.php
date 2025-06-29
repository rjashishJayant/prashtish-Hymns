@extends('layouts.dashboard')

@section('title')
    {{$lyrics['lyrics_title']}}
@endsection

@section('content-area')
    <div class="card main-page-lyrics" style="height: 500px;">
        <div class="card-header bg-info"
             style="font-weight:bold; font-size: 21px;">{!! ucwords($lyrics['lyrics_title']) !!}
            <span class="float-end">
                <button onclick="history.back();" class="btn btn-dark">Back</button>
                <a href="{{route('lyrics.download', ['song_id' =>$lyrics['lyrics_id'] ])}}"
                   class="btn btn=sm btn-secondary"><i
                            class="fa-solid fa-file-pdf"></i> Download</a>
            </span>
        </div>
        <div class="card-body" style=" overflow: auto">
            {!!nl2br($lyrics['lyrics_words']) !!}
        </div>
    </div>
@endsection

<script src="{{asset('js/jquery.min.js')}}"></script>
<script>
    $(document).ready(function () {
        $('.search-box-div').css('display', 'none');
    });
</script>
