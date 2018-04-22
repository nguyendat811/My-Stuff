@extends('layouts.app')
@section('content')
    @if(Auth::user()->hasRole('admin'))
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">

                {{--<a href="{{url('admin/category/create')}}" class="btn btn-sm btn-info">Add category</a>--}}


                <table class="table table-hover table-bordered">
                    <thead class="thead-dark">
                    <tr>
                        <th>Order ID</th>
                        <th>User ID</th>
                        <th>Date of Order</th>
                        <th>Total</th>
                        <th>Note</th>
                        <th>Delivered Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <a class="btn btn-success" style="margin-right: 10px;" href="{{url('admin/order')}}">All of order</a>
                    <a class="btn btn-success" style="margin-right: 10px;" href="{{url('order/delivered')}}">Delivered order</a>
                    <a class="btn btn-success" href="{{url('order/notDelivered')}}">On Processing order</a>
                    <hr>
                    <h3>
                        Order List
                    </h3>
                    {{--id,user_id, date_order, total, note, delivered--}}
                    @if(isset($listOrder))
                    @foreach ($listOrder as $order)
                        <tr>
                            <td>{{$order->id}}</td>
                            <td>{{$order->user_id}}</td>
                            <td>{{$order->date_order}}</td>
                            <td>{{$order->total}}</td>
                            <td>{{$order->note}}</td>
                            <td>
                                <?php
                                $order_status = $order->delivered;
                                if($order_status == '0')
                                    {
                                        ?>
                                    not delivered
                                <?php
                                    }
                                    elseif ($order_status == '1')
                                        {
                                ?>
                                    delivered
                                    <?php
                                        }
                                        ?>
                            </td>


                                <?php
                                if($order_status == "1")
                                    {
                                    ?>

                                <?php
                                    }
                                    elseif ($order_status == "0")
                                        {

                                            ?>
                            <td style="text-align: center;">
                                            <a href="{{url('order/edit', $order->id)}}" class="btn btn-sm btn-info">Delivered</a>
                            </td>
                                    <?php
                                        }
                                ?>



                        </tr>
                    @endforeach
                    @endif
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
