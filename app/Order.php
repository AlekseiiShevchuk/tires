<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	//Status
	const CANCELED = 0;
	const NOT_PAID = 1;
	const PAID = 2;

	const STATUS_LABELS = [
		self::CANCELED => 'Canceled',
		self::NOT_PAID => 'Not paid',
		self::PAID => 'Paid'
	];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function tires()
    {
        return $this->belongsToMany('App\TireProduct', 'orders_tires', 'order_id', 'tire_id');
    }
}
