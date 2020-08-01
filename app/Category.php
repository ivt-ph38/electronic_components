<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;


class Category extends Model
{
    protected $fillable = [
    	'name', 'slug', 'parent_id'
    ];
    

    public function products()
    {
    	return $this->hasMany('App\product');
    }

    public function childs()
    {
    	return $this->hasMany('App\Category', 'parent_id', 'id');
    }

    public function parent()
    {
        return $this->hasOne('App\Category', 'id', 'parent_id');
    }
}
