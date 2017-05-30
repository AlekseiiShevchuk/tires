<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Order;

class CanceledOrdersController extends Controller
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
     * Show list of user canceled orders.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::orderBy('id', 'DESC')
            ->where('user_id', '=', Auth::user()->id)->get()
            ->where('status', '=', Order::CANCELED)
        ;

        return view('users_orders.index')
            ->with('orders', $orders)
            ->with('status_labels', Order::STATUS_LABELS)
        ;
    }
}
