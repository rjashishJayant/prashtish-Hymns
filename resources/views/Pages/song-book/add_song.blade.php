@extends('layouts.dashboard')

@section('title')
    {{ !empty($edit_lyrics_data) ? 'Edit' : 'Add' }} Lyrics
@endsection

@section('content-area')

    <div class="card mt-4 shadow-sm">
        <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
        <span style="font-size: 20px; font-weight: bold;">
            {{ !empty($edit_lyrics_data) ? 'Edit' : 'Add' }} Lyrics
        </span>
            <a href="{{ route('lyrics.list') }}" class="btn btn-light btn-sm">
                <i class="fa-solid fa-arrow-left me-1"></i> Back To Listing
            </a>
        </div>

        <div class="card-body">
            <form action="{{ !empty($edit_lyrics_data) ? route('lyrics.update', $edit_lyrics_data['lyrics_id']) : route('lyrics.save') }}"
                  method="POST" enctype="multipart/form-data">

                @csrf
                @if(!empty($edit_lyrics_data))
                    @method('PUT')
                @endif

                <div class="row mb-3">
                    <!-- Song Name -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Song Name <span class="text-danger">*</span></label>
                        <input type="text" name="song_name" class="form-control"
                               value="{{ old('song_name', $edit_lyrics_data['lyrics_title'] ?? '') }}">
                        @error('song_name')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Worshipper Name -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Worshipper Name</label>
                        <input type="text" name="worshipper_name" class="form-control"
                               value="{{ old('worshipper_name', $edit_lyrics_data['worshipper_name'] ?? '') }}">
                        @error('worshipper_name')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <!-- Category -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Category <span class="text-danger">*</span></label>
                        <select name="category_id" class="form-select">
                            <option value="">-- Select Category --</option>
                            @foreach($categories as $category)
                                <option value="{{ $category['cat_id'] }}"
                                    {{ old('category_id', $edit_lyrics_data['lyrics_cat_id'] ?? '') == $category['cat_id'] ? 'selected' : '' }}>
                                    {{ $category['cat_name'] }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Status -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Status <span class="text-danger">*</span></label>
                        <select name="lyrics_status" class="form-select">
                            <option value="">-- Select Status --</option>
                            <option value="1" {{ old('lyrics_status', $edit_lyrics_data['lyrics_status'] ?? '') == '1' ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('lyrics_status', $edit_lyrics_data['lyrics_status'] ?? '') == '0' ? 'selected' : '' }}>Inactive</option>
                        </select>
                        @error('lyrics_status')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <!-- Lyrics Textarea -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Lyrics <span class="text-danger">*</span></label>
                    <textarea name="lyrics" class="form-control" rows="5">{{ old('lyrics', $edit_lyrics_data['lyrics_words'] ?? '') }}</textarea>
                    @error('lyrics')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Thumbnail -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Thumbnail (Optional)</label>
                    <input type="file" name="thumbnail" class="form-control" accept="image/*">
                    @error('thumbnail')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                    @if (!empty($edit_lyrics_data['lyrics_thumbnail']))
                        <div class="mt-2">
                            <img src="{{ asset('uploads/thumbnails/' . $edit_lyrics_data['lyrics_thumbnail']) }}"
                                 alt="Current Thumbnail" class="img-thumbnail" style="max-height: 120px;">
                        </div>
                    @endif
                </div>

                <!-- Buttons -->
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary me-2">
                        <i class="fa-solid fa-save me-1"></i> {{ !empty($edit_lyrics_data) ? 'Update' : 'Add' }}
                    </button>
                    <button type="reset" class="btn btn-secondary">
                        <i class="fa-solid fa-rotate-left me-1"></i> Reset
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
