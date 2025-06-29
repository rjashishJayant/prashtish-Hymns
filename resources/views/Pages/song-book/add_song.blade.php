@extends('layouts.dashboard')

@section('title')
    {{!empty($edit_lyrics_data)?'Edit':'Add'}} Lyrics
@endsection

@section('content-area')
    <!-- category form -->
    <div class="card margin-top-10" style="height: 480px; overflow: auto">
        <div class="card-header bg-success"
             style="font-weight:bold; font-size: 21px;">{{!empty($edit_lyrics_data)?'Edit':'Add'}} Lyrics
        </div>
        <div class="card-body" style="height: 585px">
            <a href="{{route('lyrics.list')}}" class="btn btn-outline-info"
               style="margin-top: 0; margin-right: 10px; float:right; color: #1a1d20">Back To Listing</a>
            <form
                action="{{!empty($edit_lyrics_data)?route('lyrics.update',$edit_lyrics_data['lyrics_id']):route('lyrics.save')}}"
                method="post">

                @if(!empty($edit_lyrics_data))
                    @method('PUT')
                @endif
                @csrf
                <div class="row margin-top-40">
                    <div class="form-group col-md-6">
                        <div class="label">
                            <label class="col-form-label" style="font-weight: 600">Song Name<span
                                    class="text-danger fw-bold ms-md-1">*</span></label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" name="song_name" id="song_name" class="form-control"
                                   autocomplete="off"
                                   value="{{!empty($edit_lyrics_data['lyrics_title'])?$edit_lyrics_data['lyrics_title']:old('song_name')}}">
                        </div>
                        @error('song_name')
                        <div style="color:red;">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <div class="label">
                            <label class="col-form-label" style="font-weight: 600">Worshipper Name</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" name="worshipper_name" id="worshipper_name" class="form-control"
                                   autocomplete="on"
                                   value="{{!empty($edit_lyrics_data['lyrics_title'])?$edit_lyrics_data['lyrics_title']:old('worshipper_name')}}">
                        </div>
                        @error('worshipper_name')
                        <div style="color:red;">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="col-form-label" style="font-weight: 600">Category<span
                                class="text-danger fw-bold ms-md-1">*</span></label>
                        <div class="col-md-12">
                            <select class="form-select" name="category_id">
                                <option value="">**Select Category**</option>
                                @foreach($categories AS $category)
                                    <option
                                        value="{{$category['cat_id']}}" {{old('category_id') == $category['cat_id']?'selected':''}}{{!empty($edit_lyrics_data['lyrics_cat_id']) && $edit_lyrics_data['lyrics_cat_id'] == $category['cat_id']?'selected':''}}>
                                        {{$category['cat_name']}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        @error('category_id')
                        <div style="color:red;">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="col-form-label" style="font-weight: 600">Status<span
                                class="text-danger fw-bold ms-md-1">*</span></label>
                        <div class="col-md-12">
                            <select class="form-select" name="lyrics_status">
                                <option value="">**Select Status**</option>
                                <option
                                    value="1" {{old('lyrics_status')=='1'?'selected':''}}{{!empty($edit_lyrics_data['lyrics_status']) && $edit_lyrics_data['lyrics_status'] =='1'?'selected':''}}>
                                    Active
                                </option>
                                <option
                                    value="0" {{old('lyrics_status')=='0'?'selected':''}}{{!empty($edit_lyrics_data['lyrics_status']) && $edit_lyrics_data['lyrics_status'] =='0'?'selected':''}}>
                                    Inactive
                                </option>
                            </select>
                        </div>
                        @error('lyrics_status')
                        <div style="color:red;">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label class="col-form-label" style="font-weight: 600">Lyrics<span
                                class="text-danger fw-bold ms-md-1">*</span></label>
                        <div class="col-md-12">
                            <textarea class="form-control" name="lyrics" id="lyrics" rows="4"
                                      autocomplete="off">{{ !empty($edit_lyrics_data) ? e($edit_lyrics_data['lyrics_words']) : '' }}</textarea>
                        </div>
                        @error('lyrics')
                        <div style="color:red;">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <div class="label">
                            <label class="col-form-label" style="font-weight: 600">Thumbnail</label>
                        </div>
                        <div class="col-md-12">
                            <input type="file" accept="image/*" name="thumbnail" id="thumbnail" class="form-control"
                                   autocomplete="off"
                                   value="{{!empty($edit_lyrics_data['lyrics_thumbnail'])?$edit_lyrics_data['lyrics_thumbnail']:old('thumbnail')}}">
                        </div>
                        @error('thumbnail')
                        <div style="color:red;">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="btn-group-md text-md-center mt-md-3">
                    <button type="submit"
                            class="btn btn-primary m-md-2">{{!empty($edit_lyrics_data)?'Update':'Add'}}
                    </button>
                    <button type="reset" class="btn btn-warning">Reset</button>
                </div>
            </form>
        </div>
    </div>
@endsection

