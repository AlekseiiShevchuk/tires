<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function tires()
    {
        return $this->belongsToMany('App\TireProduct', 'orders_tires', 'order_id', 'tire_id');
    }
}
