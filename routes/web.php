<?php
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','FrontController@index')->name('front.home');

//Route::get('/checkout', 'CartController@checkout');
Route::get('front/shipping', function (){
    return view('front/payment');
});
Route::post('/checkoutDone', 'CartController@checkoutDone')->name('checkout.done');
Route::post('/checkoutByCreditDone', 'CartController@checkoutByCreditDone');

//shopping cart//shopping cart//shopping cart//shopping cart//shopping cart//shopping cart
//shopping cart//shopping cart//shopping cart//shopping cart//shopping cart//shopping cart

Route::get('/cart', 'CartController@index')->name('cart.mycart');
Route::get('/cart/add-item/{id}','CartController@addItem')->name('cart.addItem');
Route::get('/cart/update/{id}','CartController@update')->name('cart.update');
Route::get('/cart/destroy/{id}','CartController@destroy')->name('cart.destroy');

//login//login//login//login//login//login//login//login//login//login//login//login
//login//login//login//login//login//login//login//login//login//login//login//login

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//Product//Product//Product//Product//Product//Product//Product//Product//Product
//Product//Product//Product//Product//Product//Product//Product//Product//Product

Route::get('admin/product', function()
{
    $listPro = DB::select('call sp_view_product');
    return view('admin/product/view',compact('listPro'));
});

Route::get('admin/product/create', function (){
    $catelist = DB::select('call sp_listofCate_category');

    if(isset($catelist))
    {
        return view('admin/product/create', compact('catelist'));
    }
});

Route::post('admin/product/Proadd', function (Request $request){
    //'name','description','price','category_id','image'
    // 0 admin 1 user.
    //get user_id of user
    $user = Auth::user();
    $user_id = $user->id;

    $product_name = $request->input('name');
    $product_des = $request->input('description');
    $product_price = $request->input('price');
    $product_category_id = $request->input('category');
    $user_product = '0';
    if($request->hasFile('image'))
    {
        $image = $request->file('image');
        $imgName = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $imgName);
    }

    DB::select('call sp_insert_product(?,?,?,?,?,?,?)', array($user_id,$product_name,$product_des,$product_price,$product_category_id,$user_product,$imgName));
    return redirect('admin/product');

});

Route::get('product/delete/{id}',function($id)
{
    DB::select('call sp_delete_product(?)',array($id));

    return redirect('admin/product');
});

Route::get('product/edit/{id}', function ($id)
{
    //search a product by product id
    $pro = DB::select('call sp_findProById_product(?)', array($id));
    $catelist = DB::select('call sp_listofCate_category');

    if(isset($pro) && ($catelist))
    {
        return view('admin/product/edit', compact('pro','catelist'));
    }
});

Route::post('product/update/{id}', function (Request $request)
{
    //'name','description','price','category_id','image'
    $pro_id = $request->input('id');
    $pro_name = $request->input('name');
    $pro_des = $request->input('description');
    $pro_price = $request->input('price');
    $pro_category = $request->input('category');

    if($request->hasFile('image'))
    {
        $image = $request->file('image');
        $imgName = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $imgName);
    }

    DB::select('call sp_update_product(?,?,?,?,?,?)', array($pro_name,$pro_des,$pro_price,$pro_category,$imgName,$pro_id));
    return redirect('admin/product');
});

//UserProduct//UserProduct//UserProduct//UserProduct//UserProduct//UserProduct//UserProduct
//UserProduct//UserProduct//UserProduct//UserProduct//UserProduct//UserProduct//UserProduct

Route::get('front/userhome', function()
{
    $user = Auth::user();
    if (isset($user))
    {
        $user_id = $user->id;
        $listPro = DB::select('call sp_view_Userproduct(?)', array($user_id));
    }


    return view('front/userhome',compact('listPro'));
});

Route::get('userProduct/create', function (){
    $catelist = DB::select('call sp_listofCate_category');
    if(isset($catelist))
    {
        return view('front/userProduct/create', compact('catelist'));
    }
});

Route::post('userProduct/Proadd', function (Request $request){
    //'name','description','price','category_id','image'
    // 0 admin 1 user.
    $user = Auth::user();
    $user_id = $user->id;

    $product_name = $request->input('name');
    $product_des = $request->input('description');
    $product_price = $request->input('price');
    $product_category_id = $request->input('category');
    $user_product = '1';
    if($request->hasFile('image'))
    {
        $image = $request->file('image');
        $imgName = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $imgName);
    }

    DB::select('call sp_insert_product(?,?,?,?,?,?,?)', array($user_id,$product_name,$product_des,$product_price,$product_category_id,$user_product,$imgName));
    return redirect('front/userhome');

});

Route::get('product/delete/{id}',function($id)
{
    DB::select('call sp_delete_product(?)',array($id));

    return redirect('front/userhome');
});

Route::get('userProduct/edit/{id}', function ($id)
{
    //search a product by product id
    $pro = DB::select('call sp_findProById_product(?)', array($id));
    $catelist = DB::select('call sp_listofCate_category');

    if(isset($pro) && ($catelist))
    {
        return view('front/userProduct/edit', compact('pro','catelist'));
    }
});

Route::post('userProduct/update/{id}', function (Request $request)
{
    //'name','description','price','category_id','image'
    $pro_id = $request->input('id');
    $pro_name = $request->input('name');
    $pro_des = $request->input('description');
    $pro_price = $request->input('price');
    $pro_category = $request->input('category');

    if($request->hasFile('image'))
    {
        $image = $request->file('image');
        $imgName = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $imgName);
    }

    DB::select('call sp_update_product(?,?,?,?,?,?)', array($pro_name,$pro_des,$pro_price,$pro_category,$imgName,$pro_id));
    return redirect('front/userhome');
});

//Category//Category//Category//Category//Category//Category//Category//Category
//Category//Category//Category//Category//Category//Category//Category//Category

Route::get('admin/category', function (){
   $listCate = DB::select('call sp_view_category');
   return view('admin/category/view', compact('listCate'));
});

Route::get('admin/category/create', function (){
   return view('admin/category/create');
});

Route::post('admin/category/Cateadd', function (Request $request){
    $cate_name = $request->input('name');
    DB::select('call sp_insert_category(?)', array($cate_name));
    return redirect('admin/category');
});

Route::get('category/edit/{id}', function ($id)
{
    $cate = DB::select('call sp_findCateById_category(?)', array($id));
    if(isset($cate))
    {
        return view('admin/category/edit', compact('cate'));
    }
});

Route::post('category/update/{id}', function (Request $request){
    $cate_id = $request->input('id');
    $cate_name = $request->input('name');

    DB::select('call sp_update_category(?,?)', array($cate_name, $cate_id));
    return redirect('admin/category');
});

//Order//Order//Order//Order//Order//Order//Order//Order//Order//Order//Order
//Order//Order//Order//Order//Order//Order//Order//Order//Order//Order//Order

Route::get('admin/order', function(){
    $listOrder = DB::select('call sp_view_order');
    return view('admin/order/view', compact('listOrder'));
});

Route::get('order/edit/{id}', function ($id){
    DB::select('call sp_update_orderStatus_order(?)', array($id));

    $orderDetails = DB::select('call sp_searchOrderDetailByID_orderDetails(?)', array($id));
    if(isset($orderDetails))
    {
        foreach ($orderDetails as $details)
        {
            $product_id = $details->product_id;

            if(isset($product_id))
            {
                $product = DB::select('call sp_SearchProductByID_product(?)', array($product_id));

                foreach ($product as $product_details)
                {
                    $user_id = $product_details->user_id;

                    if (isset($user_id))
                    {

                        $oldpoint = DB::select('call sp_TakePoint_users(?)', array($user_id));

                        if(isset($oldpoint))
                        {
//                            dd($oldpoint);
                            foreach ($oldpoint as $oldpoint_detail)
                            {
                                $oldpoint2 =$oldpoint_detail->credit_point;
                            }
                            $newpoint = $oldpoint2 + 1;

                            DB::select('call sp_saveCreditPointAfterPayment(?,?)', array($user_id,$newpoint));
                            return redirect()->route('home');
                        }


                    }
                }
            }
        }
    }
    return redirect()->back();
});

Route::get('order/delivered',function ()
{
    $listOrder = DB::select('call sp_view_DeliveredOrder_order');
    return view('admin/order/view', compact('listOrder'));
});

Route::get('order/notDelivered', function ()
{
    $listOrder = DB::select('call sp_view_OnProcessingOrder_order');
    return view('admin/order/view', compact('listOrder'));
});

//payment//payment//payment//payment//payment//payment//payment//payment//payment
//payment//payment//payment//payment//payment//payment//payment//payment//payment

Route::get('payment', function (){
    return view('front/payment');
});
Route::post('store-payment', function ()
{
    $cartItems=Cart::content();
    return view('front/shipping', compact('cartItems'));
})->name('payment.store');
Route::get('checkout/creditPoint', function () {
    $cartItems=Cart::content();
    return view('front/creditPoint', compact('cartItems'));
});