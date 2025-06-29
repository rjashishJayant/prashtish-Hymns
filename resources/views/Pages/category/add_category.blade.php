@extends('layouts.dashboard')

@section('title')
    {{!empty($edit_category_data)?'Edit':'Add'}} Song Category
@endsection

@section('content-area')
    <!-- category form -->
    <div class="card margin-top-25">
        <div class="card-header bg-success"
             style="font-weight:bold; font-size: 21px;">{{!empty($edit_category_data)?'Edit':'Add'}} Category
        </div>
        <div class="card-body">
            <a href="{{route('categories.list')}}" class="btn btn-outline-info"
               style="margin-top: 0; margin-right: 10px; float:right;">Back To Listing</a>
            <form
                action="{{empty($edit_category_data)?route('category.save'):route('category.update',$edit_category_data['cat_id'])}}"
                method="post">
                @if(!empty($edit_category_data))
                    @method('PUT')
                @endif
                @csrf
                <div class="row margin-top-40">
                    <div class="form-group col-md-6">
                        <div class="label">
                            <label class="col-form-label" style="font-weight: 600">Category Name:</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" name="category_name" id="category_name" class="form-control"
                                   autocomplete="off"
                                   value="{{!empty($edit_category_data['cat_name'])?$edit_category_data['cat_name']:''}}">
                        </div>
                        @error('category_name')
                        <div style="color:red;">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="col-form-label" style="font-weight: 600">Status:</label>
                        <div class="col-md-12">
                            <select class="form-select" name="category_status">
                                <option value="">**Select Status**</option>
                                <option
                                    value="active" {{!empty($edit_category_data['cat_status']) && $edit_category_data['cat_status'] =='active'?'selected':''}}>
                                    Active
                                </option>
                                <option
                                    value="inactive" {{!empty($edit_category_data['cat_status']) && $edit_category_data['cat_status'] =='inactive'?'selected':''}}>
                                    Inactive
                                </option>
                            </select>
                        </div>
                        @error('category_status')
                        <div style="color:red;">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label class="col-form-label" style="font-weight: 600">Description:</label>
                        <div class="col-md-12">
                            <textarea class="form-control" name="category_desc" id="category_desc" rows="5"
                                      autocomplete="off">{{!empty($edit_category_data['cat_desc'])?e($edit_category_data['cat_desc']):''}}</textarea>
                        </div>
                        @error('category_desc')
                        <div style="color:red;">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="btn-group-md text-md-center mt-md-3">
                        <button type="submit"
                                class="btn btn-primary m-md-2">{{!empty($edit_category_data)?'Update':'Add'}}</button>
                        <button type="reset" class="btn btn-warning">Reset</button>
                    </div>

            </form>
        </div>
    </div>
@endsection

