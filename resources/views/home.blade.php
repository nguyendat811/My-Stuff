@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(Auth::user()->hasRole('user'))
                            <?php
                            $user = Auth::user();
                            if(isset($user))
                            {
                                $user_name = $user->name;
                                $user_credit = $user->credit_point;
                            }
                            ?>
                                Hello {{$user_name}}!
                                <p style="color: red;">Your Credit Point is : {{$user_credit}}</p>

                                <div id="wrapper">
                                <!-- Sidebar -->
                                <div id="sidebar-wrapper">
                                    <ul class="sidebar-nav">

                                        <li>
                                            <a href="front/userhome">My Gallery</a>
                                        </li>
                                        <li>
                                            <a href="{{url('/')}}"><< Back</a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- /#sidebar-wrapper -->
                            </div>
                        @endif

                    @if(Auth::user()->hasRole('admin'))

                            <?php
                            $user = Auth::user();
                            if(isset($user))
                            {
                                $user_name = $user->name;
                                $user_credit = $user->credit_point;
                            }
                            ?>
                            Hello admin {{$user_name}}!
                                <p style="color: red;">Your Credit Point is : {{$user_credit}}</p>
                            <div id="wrapper">
                                <!-- Sidebar -->
                                <div id="sidebar-wrapper">
                                    <ul class="sidebar-nav">
                                        {{--<li class="sidebar-brand">--}}
                                            {{--<a href="#">--}}
                                                {{--Admin Page--}}
                                            {{--</a>--}}
                                        {{--</li>--}}
                                        <li>
                                            <a href="{{url('admin/category')}}">Category</a>
                                        </li>
                                        <li>
                                            <a href="{{url('admin/product')}}">Products</a>
                                        </li>
                                        <li>
                                            <a href="{{url('admin/order')}}">Order</a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- /#sidebar-wrapper -->
                            </div>
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
