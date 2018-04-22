<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="x-ua-compatible" content="ie=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>
        @yield('title','Phone Cases Shop')
    </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="{{asset('dist/css/foundation.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('dist/css/app.css')}}"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.css" rel="stylesheet">

</head>
<body>
<div  class="top-bar">
    <div style="color:white" class="top-bar-left">
        <h4 class="brand-title">
            <a href="{{route('front.home')}}">
                <i class="fa fa-home fa-lg" aria-hidden="true">
                </i>
                Phone Cases Shop
            </a>
        </h4>
    </div>
    <div class="top-bar-right">
        <ol class="menu">
            {{--<li>--}}
                {{--<a href="#">--}}
                    {{--Cases--}}
                {{--</a>--}}
            {{--</li>--}}
            <li>
                <?php
                $user = Auth::user();
                if(isset($user))
                {
                    $user_info = $user->name;
                    ?>
                    <a href="{{route('home')}}">
                        Hello {{$user_info}} !!
                    </a>
                <?php
                }
                else
                    {
                        ?>
                    <a href="{{route('home')}}">
                        Login
                    </a>
                    <?php
                    }
                ?>

            </li>
            <li>
                <a href="{{route('cart.mycart')}}">
                    <i class="fa fa-shopping-cart fa-2x" aria-hidden="true">
                    </i>
                    CART
                    <span class="alert badge">
                        {{Cart::count()}}
                    </span>
                </a>
            </li>
        </ol>
    </div>
</div>


<section class="hero text-center">
    <br/>
    <br/>
    <br/>
    <br/>
    <h2 >
        <strong>
            Welcome to my shop!!
        </strong>
    </h2>
    <br>
    <a href="#"><button class="button large">More Products!!</button></a>
</section>
<br/>
@yield('content')

<!-- Footer -->
<br>
<footer class="footer">
    <div class="row full-width">
        <div class="small-12 medium-4 large-4 columns">
            <i class="fi-laptop"></i>
            <p>DatNguyen &copy; 2017</p>
        </div>
        <div class="small-12 medium-4 large-4 columns">
            <i class="fi-html5"></i>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit impedit consequuntur at! Amet sed itaque nostrum, distinctio eveniet odio, id ipsam fuga quam minima cumque nobis veniam voluptates deserunt!</p>
        </div>

        <div class="small-6 medium-4 large-4 columns">
            <h4>Follow Us</h4>
            <ul class="footer-links">
                <li><a href="#">GitHub</a></li>
                <li><a href="#">Facebook</a></li>
                <li><a href="#">Twitter</a></li>
            </ul>
        </div>
    </div>
</footer>
<script href="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="{{asset('dist/js/vendor/jquery.js')}}"></script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
{{--<script type="text/javascript">--}}
    {{--//    pk_test_xKgSAXETatpfKGQnzIXtvIIY--}}
    {{--Stripe.setPublishableKey('sk_test_CCsBwpYwyn5YnXfHcvuyxXSF');--}}
{{--</script>--}}
<script src="{{asset('dist/js/app.js')}}"></script>
</body>
</html>
