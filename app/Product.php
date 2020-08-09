<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Productimage;

class Product extends Model
{
    public function category()
    {
    	return $this->belongsTo('App\Category', 'category_id');
    }

    public function images()
    {
    	return $this->hasMany('App\ProductImage');
    }
}
