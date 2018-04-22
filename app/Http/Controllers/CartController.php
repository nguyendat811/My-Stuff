<?php

namespace App\Http\Controllers;
use App\Order;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function Sodium\compare;


class CartController extends Controller
{
    public function index()
    {
        $cartItems=Cart::content();

        return view('front/cart',compact('cartItems'));
    }

    public function addItem($id)
    {


        $product = DB::select('call sp_findProById_product(?)', array($id));

        foreach ($product as $pro_detail)
        {
            $pro_detail->name;
            $pro_detail->price;

            Cart::add($id, $pro_detail->name,1,$pro_detail->price);
        }


        return back();
    }

    public function update(Request $request, $id)
    {

        Cart::update($id,['qty'=>$request->qty]);
        return back();
    }

    public function checkout()
    {
        $cartItems=Cart::content();
        return view('front/cart',compact('cartItems'));
    }

    public function checkoutDone(Request $request)
    {
        //check user Auth ->get user id
        $user = Auth::user();
        if(isset($user))
        {
            $user_id = $user->id;
            $dat_order = date('Y-m-d H:i:s');
            $total = Cart::total();
            $delivered = 0;
            $note = $request->input('note');

            DB::select('call sp_insert_order(?,?,?,?,?)', array($user_id, $dat_order, $total, $note, $delivered));

            $order_data = DB::select('call sp_findOrderByDate(?)', array($dat_order));

            foreach ($order_data as $details) {
                $order_id = $details->id;
            }
            $cartItems = Cart::content();
            foreach ($cartItems as $cartItem) {
                $product_id = $cartItem->id;
                $quantity = $cartItem->qty;
                $price = $cartItem->price;
            }
            $order_details = DB::select('call sp_addOrderDetail(?,?,?,?)', array($order_id, $product_id, $quantity, $price));

            //user_id, order_id, name, email, address, phone_number

            $shipping_name = $request->input('fullName');
            $shipping_email = $request->input('email');
            $shipping_address = $request->input('address');
            $shipping_phonenum = $request->input('phoneNumber');

            DB::select('call sp_addShippingInfo(?,?,?,?,?,?)', array($user_id,$order_id,$shipping_name,$shipping_email,$shipping_address,$shipping_phonenum));

            Cart::destroy();
            return redirect()->route('front.home');
        }
        else{
            return redirect()->route('front.home');
        }

    }


    // check out by credit point
    public function checkoutByCreditDone(Request $request)
    {
        $user = Auth::user();

        if(isset($user))
        {
            $user_id = $user->id;
            $user_credit = $user->credit_point;

            if(isset($user_credit))
            {
                $user_id = $user->id;
                $dat_order = date('Y-m-d H:i:s');
                $total = Cart::total();
                $delivered = 0;
                $note = $request->input('note');
                $payment = $user_credit - $total;
                if($payment >= 0)
                {
                    DB::select('call sp_saveCreditPointAfterPayment(?,?)', array($user_id,$payment));
                    // create a new order
                    DB::select('call sp_insert_order(?,?,?,?,?)', array($user_id, $dat_order, $total, $note, $delivered));
                }
                else
                {
                    return redirect()->back();
                }
                //get order id after create an order successful
                $order_data = DB::select('call sp_findOrderByDate(?)', array($dat_order));

                foreach ($order_data as $details) {
                    $order_id = $details->id;
                }
                $cartItems = Cart::content();
                foreach ($cartItems as $cartItem) {
                    $product_id = $cartItem->id;
                    $quantity = $cartItem->qty;
                    $price = $cartItem->price;
                }
                // create order details for order.
                $order_details = DB::select('call sp_addOrderDetail(?,?,?,?)', array($order_id, $product_id, $quantity, $price));

                //user_id, order_id, name, email, address, phone_number
                // create shipping information in shipping infor table after create successful order details.
                $shipping_name = $request->input('fullName');
                $shipping_email = $request->input('email');
                $shipping_address = $request->input('address');
                $shipping_phonenum = $request->input('phoneNumber');

                DB::select('call sp_addShippingInfo(?,?,?,?,?,?)', array($user_id,$order_id,$shipping_name,$shipping_email,$shipping_address,$shipping_phonenum));

                Cart::destroy();
                return redirect()->route('front.home');
            }
        }

        else{
            return redirect()->route('front.home');
        }

    }


    public function destroy($id)
    {
        Cart::remove($id);
        return back();
    }
}
