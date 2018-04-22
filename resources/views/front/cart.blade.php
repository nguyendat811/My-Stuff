@extends('layout.main')
@section('content')
    <div class="row">
        <div class="large-3 columns">
            &nbsp;
        </div>
        <div class="large-6 columns">
            <section id="cart_items">
                <div>
                    <h3>Your Cart</h3>
                    <div class="table-responsive cart_info">
                        <table class="table table-condensed">
                            <thead>
                            <tr class="cart_menu">
                                <td class="name">Item</td>

                                <td class="price">Price</td>
                                <td class="quantity">Quantity</td>
                                <td class="remove">Remove</td>
                                <td class="total">Total</td>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cartItems as $cartItem)
                                <tr>
                                    <td>{{$cartItem->name}}</td>

                                    <td>{{$cartItem->price}}</td>

                                    <form action="{{route('cart.update', $cartItem->rowId)}}" method = "get">
                                        <td width="50px">
                                            <input name="qty" type="text" value="{{$cartItem->qty}}">
                                        </td>
                                        <td>
                                            <input class="button btn-info" type="submit" value="update">
                                        </td>
                                    </form>

                                    </td>

                                    <td>
                                        <form action="{{route('cart.destroy',$cartItem->rowId)}}" method="get">
                                            <input class="button btn-danger" type="submit" value="Remove From Cart">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Items:{{Cart::count()}}</td>
                                <td>
                                    Tax: $ {{Cart::tax()}} <br>
                                    SubTotal: ${{Cart::subtotal()}}<br>
                                    Total:$ {{Cart::total()}}
                                </td>


                            </tr>
                            </tbody>
                        </table>
                        </tbody>
                        </table>
                    </div>
                </div>

                <a href="{{url('front/shipping')}}" class="button btn-info" style="float: right;">Check Out</a>

            </section> <!--/#cart_items-->


        </div>

        <div class="large-3 columns">
            &nbsp;
        </div>
    </div>


@endsection