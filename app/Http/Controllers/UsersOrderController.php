<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreOrderRequest;
use App\Order;
use App\OrderTire;

class UsersOrderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Store a newly created Order and OrderTires for junction table.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        if (is_null(Auth::user()->address) && is_null(Auth::user()->phone)) {
            return redirect()->route('account-address.store');
        }

        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->status = Order::NOT_PAID;
        $order->count = count($request->tires);
        $order->price = $request->price;
        $order->identifier = Auth::user()->id . time();
        $order->save();

        foreach ($request->tires as $tire) {
        	$orderTire = new OrderTire();
        	$orderTire->tire_id = $tire;
        	$orderTire->order_id = $order->id;
        	$orderTire->save();
        }

        return redirect()->route('index_route');
    }
}

