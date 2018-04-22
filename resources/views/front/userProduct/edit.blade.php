@extends('layouts.app')

@section('content')

        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h3>Stored Procedures Panel</h3>

                @foreach($pro as $pro_detail)

                    <form method="post" action="{{{url("userProduct/update/$pro_detail->id")}}}" class="form-horizontal panel"  enctype="multipart/form-data">
                        {{--//'name','description','price','category_id','image'--}}

                        {!! csrf_field() !!}
                        <div class="form-group ">
                            <label for="id" class="col-md-4 control-label">Product id:</label>
                            <div class="col-md-12">
                                <input class="form-control" name="id" type="text" id="id" readonly="readonly" value="{{$pro_detail->id}}">
                            </div>
                            <label for="name" class="col-md-4 control-label">Product name:</label>
                            <div class="col-md-12">
                                <input class="form-control" name="name" type="text" id="name" value="{{$pro_detail->name}}">
                            </div>
                            <label for="description" class="col-md-4 control-label">Description:</label>
                            <div class="col-md-12">
                                <input class="form-control" name="description" type="text" id="path" value="{{$pro_detail->description}}">
                            </div>

                            <label for="price" class="col-md-4 control-label">Price:</label>
                            <div class="col-md-12">
                                <input class="form-control" name="price" type="text" id="price" value="{{$pro_detail->price}}">
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

                            <div class="col-md-6 col-md-offset-4">
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
