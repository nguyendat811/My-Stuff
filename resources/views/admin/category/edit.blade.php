@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <h3>Update Category Name</h3>

        @foreach($cate as $cate_detail)

            <form method="post" action="{{{url("category/update/$cate_detail->id")}}}" class="form-horizontal panel"  enctype="multipart/form-data">

                {!! csrf_field() !!}
                <div class="form-group ">
                    <label for="id" class="col-md-4 control-label">Product id:</label>
                    <div class="col-md-12">
                        <input class="form-control" name="id" type="text" id="id" readonly="readonly" value="{{$cate_detail->id}}" required = "required">
                    </div>
                    <label for="name" class="col-md-4 control-label">Product name:</label>
                    <div class="col-md-12">
                        <input class="form-control" name="name" type="text" id="name" value="{{$cate_detail->name}}" required = "required">
                    </div>
                    <hr>

                    <div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                    <div class="col-md-6 col-md-offset-4">
                        <input type="hidden" value="{{ Session::token()}}" name="_token">
                    </div>
                </div>

            </form>

        @endforeach
    </div>
    <div class="col-md-3"></div>

</div>

@endsection