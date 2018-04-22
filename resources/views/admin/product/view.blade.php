@extends('layouts.app')
@section('content')
    @if(Auth::user()->hasRole('admin'))
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <a href="{{url('admin/product/create')}}" class="btn btn-sm btn-info">Add Product</a>
            <hr>
            <table class="table table-hover table-bordered">
                <thead class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Category_id</th>
                    <th>Image</th>
                    <th>Delete</th>
                    <th>Update</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($listPro as $pro)
                    <tr>
                        <td>{{$pro->id}}</td>
                        <td>{{$pro->name}}</td>
                        <td>{{$pro->description}}</td>
                        <td>{{$pro->price}}</td>
                        <td>{{$pro->category_id}}</td>
                        <td><img src="{{asset('images/'.$pro->image)}}" alt="error" style="height: 20%;"></td>
                        <td>
                            <a href="{{url('product/delete', $pro->id)}}" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                        <td>
                            <a href="{{url('product/edit', $pro->id)}}" class="btn btn-sm btn-info">Update</a>
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

