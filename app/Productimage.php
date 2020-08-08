<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Productimage extends Model
{
    public function product()
    {
    	$this->belongTos('App\Product','product_id');
    }
}
