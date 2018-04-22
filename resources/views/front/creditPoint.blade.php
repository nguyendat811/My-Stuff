@extends('layout.main')
@section('content')

    <div class="row">
        <?php
        $user = Auth::user();
        if(isset($user))
        {
            $user_name = $user->name;
            $user_credit = $user->credit_point;
        }
        else
            {
                return redirect()->route('front.home');
            }
        ?>
        Hello admin {{$user_name}}!
        <p style="color: red;">Your Credit Point is : {{$user_credit}}</p>

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

            </section> <!--/#cart_items-->


        </div>

        <div class="large-6 columns">
            <section>
                <form action="{{ url('/checkoutByCreditDone') }}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div>
                        <div>
                            <div class="bill-to">
                                <h3>Shipping infomation</h3>
                                <div class="form-one">
                                    <input type="text" name="fullName" value="" placeholder="Full Name">
                                    <input type="text" name="email" value="" placeholder="Email">
                                    <input type="text" name="address" value="" placeholder="Address">
                                    <input type="text" name="phoneNumber" value="" placeholder="Phone Number">
                                </div>
                                <div class="form-two">
                                    <textarea name="note" value=""  placeholder="Your Note" rows="10"></textarea>
                                </div>
                                <button  class="button radius" type="submit" style="float: right;">Order</button>

                            </div>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
@endsection