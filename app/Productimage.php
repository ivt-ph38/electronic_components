<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class ProductImage extends Model
{
	protected $table = 'product_images';

	protected $fillable = [
    	'path', 'product_id'
    ];

    public function product()
    {
    	$this->belongTos('App\Product','product_id');
    }
}
