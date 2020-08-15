<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Comment extends Model
{
    protected $fillable = [
    	'content', 'parent_id', 'user_id', 'product_id'
    ];

    public function user()
    {
    	return $this->belongsTo('App\User', 'user_id');
    }

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
