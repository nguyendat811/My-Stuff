@extends('layouts.app')

@section('content')
    @if(Auth::user()->hasRole('admin'))
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div class="heading"><h3>Add Product</h3></div>

        <form method="post" action="Proadd" class="form-horizontal panel" enctype="multipart/form-data">
            {!! csrf_field() !!}
            <div class="form-group ">
                <label for="name" class="col-md-4 control-label">Product name:</label>
                <div class="col-md-12">
                    <input class="form-control" name="name" type="text" id="name" value="" required = "required">
                </div>
                <label for="description" class="col-md-4 control-label">Description:</label>
                <div class="col-md-12">
                    <input class="form-control" name="description" type="text" id="path" value="" required = "required">
                </div>

                <label for="price" class="col-md-4 control-label">Price:</label>
                <div class="col-md-12">
                    <input class="form-control" name="price" type="text" id="price" value="" required = "required">
                </div>

                <label for="category" class="col-md-4 control-label">Category:</label>
                <div class="col-md-12">
                    <select class="col-md-6 form-control" id="category" name="category">
                        @foreach($catelist as $cate)
                            <option value="{{$cate->id}}">{{$cate->name}}</option>
                        @endforeach
                    </select>
                </div>

                <label for="image" class="col-md-4 control-label">Image:</label>
                <div class="col-md-12">
                    <input class="form-control" type="file" name="image" >
                </div>

                <hr>

                <div class="col-md-12">
                    <button type="submit" class="btn btn-success" style="margin-top: 5px; float: right;">Send Data</button>
                </div>
                <div class="col-md-6 col-md-offset-4">
                <input type="hidden" value="{{ Session::token()}}" name="_token">
                </div>
            </div>
        </form>
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