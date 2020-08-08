<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
    	'code', 'name', 'status', 'total', 'discount', 'phone', 'email', 'address', 'message', 'user_id'
    ];

    public function details()
    {
    	return $this->hasMany('App\OrderDetail');
    }
}
