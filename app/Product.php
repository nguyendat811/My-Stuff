<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //'name','description','price','category_id','image'
    protected $fillable = ['name','description','price','category_id','image'];

    public function category()
    {
        return $this->belongsTo(category::class);
    }
}
