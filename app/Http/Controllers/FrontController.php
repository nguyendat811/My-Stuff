<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    public function index()
    {
        $listPro = DB::select('call sp_view_product');
        $listUserPro = DB::select('call sp_view_ALLUserproduct');
        $listComPro = DB::select('call sp_view_Comproduct');

        return view('front/home',compact('listPro','listUserPro','listComPro'));
    }
}

//public function index()
//{
//    $shirts= DB::table('products')
//        ->offset(0)
//        ->limit(4)
//        ->orderBy('created_at','desc')
//        ->get();
//    return view('front.home',compact('shirts'));
//}