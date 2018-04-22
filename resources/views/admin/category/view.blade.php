@extends('layouts.app')
@section('content')
    @if(Auth::user()->hasRole('admin'))
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">

        <a href="{{url('admin/category/create')}}" class="btn btn-sm btn-info">Add category</a>

        <hr>

        <table class="table table-hover table-bordered">
            <thead class="thead-dark">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Update Category Name</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($listCate as $cate)
                <tr>
                    <td>{{$cate->id}}</td>
                    <td>{{$cate->name}}</td>

                    <td style="text-align: center;">
                        <a href="{{url('category/edit', $cate->id)}}" class="btn btn-sm btn-info">Update</a>
                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>

    </div>
    <div class="col-md-3"></div>


</div>
    @else
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h3>Hello!
                    This is Admin Page</h3>
                <a href="{{route('home')}}" class="btn btn-sm btn-info">Please click here to go back !!!</a>
            </div>
            <div class="col-md-3"></div>

        </div>
    @endif
    @endsection