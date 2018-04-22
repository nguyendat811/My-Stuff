@extends('layouts.app')
@section('content')
    @if(Auth::user()->hasRole('admin'))
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="heading"><h3>Add Category</h3></div>

            <form method="post" action="Cateadd" class="form-horizontal panel" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <div class="form-group ">
                    <label for="name" class="col-md-4 control-label">Category name:</label>
                    <div class="col-md-12">
                        <input class="form-control" name="name" type="text" id="name" value="" required = "required">
                    </div>

                    <hr>

                    <div class="col-md-12" style="margin-top: 5px;">
                        <button type="submit" class="btn btn-success">Add Category</button>
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

