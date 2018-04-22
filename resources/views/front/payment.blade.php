@extends('layout.main')

@section('content')
    <div class="row">
        <div class="small-6 small-centered columns">
            <form action="{{route('payment.store')}}" method="POST" id="payment-form">
                {{csrf_field()}}
                <span class="payment-errors"></span>
                <h4>(*) You can purchase order by credit card or by your credit point !!</h4>
                <a href="{{url('checkout/creditPoint')}}">Category</a>
                <h4>(*)Please use card information below for testing.</h4>
                <div class="form-row">
                    <label>
                        <span>Card Number || 4242 4242 4242 4242</span>
                        <input type="text" size="20" data-stripe="number" required = "required">
                    </label>
                </div>

                <div class="form-row">
                    <label>
                        <span>Expiration (MM/YY) || MM: 12 / YY: 18</span>
                        <input type="text" size="2" data-stripe="exp_month" required = "required">
                        <span> / </span>
                        <input type="text" size="2" data-stripe="exp_year" required = "required">
                    </label>
                </div>

                <div class="form-row">
                    <label>
                        <span>CVC || CVC: 123</span>
                        <input type="text" size="4" data-stripe="cvc" required = "required">
                    </label>
                </div>


                <input type="submit" class="submit button success" value="Submit Payment">
            </form>
        </div>
    </div>
@endsection