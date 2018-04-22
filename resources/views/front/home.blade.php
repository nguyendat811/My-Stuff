@extends('layout.main')

@section('content')
    <div class="subheader text-center">
        <h2>
            Latest Cases
        </h2>
    </div>

    <!-- Latest Products -->
    <div class="row">

        @foreach($listPro as $pro_detail)
            <div class="small-3 columns" style="float: left;">
                <div class="item-wrapper">
                    <div class="img-wrapper">

                        <a class="button expanded add-to-cart" href="{{route('cart.addItem', $pro_detail->id)}}">
                            Add to Cart
                        </a>

                        <img src="{{asset('images/'.$pro_detail->image)}}" style="height: 286px;"/>

                    </div>

                    <h3 style="text-align: center;">
                        {{$pro_detail->name}}
                    </h3>

                    <h5 style="text-align: center;">
                        ${{$pro_detail->price}}
                    </h5>
                    <p style="text-align: center;">
                        {{$pro_detail->description}}
                    </p>
                </div>
            </div>
        @endforeach

    </div>

    <hr>
    <div class="subheader text-center">
        <h2>
            Latest Cases Designed by User
        </h2>
    </div>

    <!-- Latest Products -->
    <div class="row">
        @if(isset($listUserPro))

        @foreach($listUserPro as $proUser_detail)
            <div class="small-3 columns" style="float: left;">
                <div class="item-wrapper">
                    <div class="img-wrapper">

                        <a class="button expanded add-to-cart" href="{{route('cart.addItem', $proUser_detail->id)}}">
                            Add to Cart
                        </a>

                        <img src="{{asset('images/'.$proUser_detail->image)}}" style="height: 286px;"/>

                    </div>

                    <h3 style="text-align: center;">
                        {{$proUser_detail->name}}
                    </h3>

                    <h5 style="text-align: center;">
                        ${{$proUser_detail->price}}
                    </h5>
                    <p style="text-align: center;">
                        {{$proUser_detail->description}}
                    </p>
                </div>
            </div>
        @endforeach
        @endif
    </div>

    <hr>
    <div class="subheader text-center">
        <h2>
            Latest Company Cases
        </h2>
    </div>

    <!-- Latest Products -->
    <div class="row">

        @foreach($listComPro as $proCom_detail)
            <div class="small-3 columns" style="float: left;">
                <div class="item-wrapper">
                    <div class="img-wrapper">

                        <a class="button expanded add-to-cart" href="{{route('cart.addItem', $proCom_detail->id)}}">
                            Add to Cart
                        </a>

                        <img src="{{asset('images/'.$proCom_detail->image)}}" style="height: 286px;"/>

                    </div>

                    <h3 style="text-align: center;">
                        {{$proCom_detail->name}}
                    </h3>

                    <h5 style="text-align: center;">
                        ${{$proCom_detail->price}}
                    </h5>
                    <p style="text-align: center;">
                        {{$proCom_detail->description}}
                    </p>
                </div>
            </div>
        @endforeach

    </div>

@endsection