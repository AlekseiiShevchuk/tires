<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PreOrder extends Model
{
	const NOT_CONFIRMED = 0;
	const CONFIRMED = 1;
	
    protected $table = 'pre_orders';

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function preOrderTires()
    {
        return $this->hasMany('App\PreOrderTire', 'pre_order_id', 'id');
    }

    public function tires()
    {
        return $this->belongsToMany('App\TireProduct', 'pre_orders_tires', 'pre_order_id', 'tire_id');
    }
}
