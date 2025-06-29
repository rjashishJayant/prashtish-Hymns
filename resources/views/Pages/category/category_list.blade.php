@extends('layouts.dashboard')

@section('title')
    All Categories
@endsection

@section('content-area')

    <div class="margin-top-25">
        <hr>
        <h4>All Categories <span class="float-end"><a href="{{route('category.add')}}" class="btn btn-outline-primary"
                                                      style="margin-top: -10px; margin-right: 10px">Add Category</a></span>
        </h4>
        <hr>
        <table class="table table-striped table-bordered margin-top-25">
            <thead>
            <tr class="table-primary">
                <th>#</th>
                <th>Category Name</th>
                <th>Status</th>
                <th width="220px">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories AS $category)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$category['cat_name']}}</td>
                    <td>{!! getStatusLabel($category['cat_status']) !!}</td>
                    <td class="text-md-center">
                        <a href="{{route('category.view',$category['cat_id'])}}" class="btn btn-info">View</a>
                        <a href="{{route('category.edit',$category['cat_id'])}}" class="btn btn-primary">Edit</a>
                        <a href="{{route('category.delete',$category['cat_id'])}}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
