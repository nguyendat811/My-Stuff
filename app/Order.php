<?php

namespace App;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
    protected $fillable=['total','note','delivered','date_order'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderItem()
    {
        return $this->belongsToMany(Product::class)->withPivot('qty','total');

    }
}
