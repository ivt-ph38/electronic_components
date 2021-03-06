<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Productimage;
use App\Commnet;

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

    public function comments()
    {
    	return $this->hasMany('App\Comment')->orderBy('id', 'desc');
    }
}
