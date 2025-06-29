@extends('layouts.dashboard')

@section('title')
    View Category {{$category['cat_id']}}
@endsection

@section('content-area')
    <div class="margin-top-25">
        <div class="card" style="height: 490px; overflow: auto">
            <div class="card-body" style="height: 585px">
                <hr>
                <h4 class="margin-left-10">View Category<span class="float-end"><a href="{{route('categories.list')}}" class="btn btn-outline-info" style="margin-top: -10px; margin-right: 10px">Back To Listing</a></span></h4>
                <hr>
                <div class="row mt-md-5">
                    <div class="col-md-6">
                        <label class="form-label col-md-12" style="font-weight: 700">
                            Category Name:
                        </label>
                        <div class="col-md-12">
                            {{$category['cat_name']}}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" style="font-weight: 700">
                            Status:
                        </label>
                        <div class="col-md-12">
                            {{$category['cat_status']}}
                        </div>
                    </div>
                </div>
                <div class="row mt-md-5">
                    <label class="form-label col-md-12" style="font-weight: 700">
                        Description:
                    </label>
                    <div class="col-md-12">
                        {!! getDashOnEmpty($category['cat_desc']) !!}
                    </div>
                </div>
                <div class="row mt-md-5 ms-md-1 me-md-1" style="height: 100px; border:inset #1a1d20">
                    <div class="col-md-6">
                        <label class="form-label col-md-12 mt-md-1" style="font-weight: 700">
                            Created Details:
                        </label>
                        <div class="col-md-12 text-danger">
                            {{$category['created_at']}}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label col-md-12 mt-md-1" style="font-weight: 700">
                            Updated Details:
                        </label>
                        <div class="col-md-12 text-danger">
                            {{$category['updated_at']}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
