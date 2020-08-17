<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Comment extends Model
{
    protected $fillable = [
    	'content', 'parent_id', 'product_id', 'name', 'email'
    ];

   public function product()
    {
        return $this->belongsTo('App\Product', 'product_id');
    }

    public function childs()
    {
    	return $this->hasMany('App\Comment', 'parent_id', 'id')->orderBy('id', 'desc');
    }

    public function parent()
    {
        return $this->hasOne('App\Comment', 'id', 'parent_id');
    }
}
