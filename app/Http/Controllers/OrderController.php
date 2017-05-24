<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of Order.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('order_list')) {
            return abort(401);
        }

        $orders = Order::all();

        return view('orders.index')
            ->with('orders', $orders)
            ->with('status_labels', Order::STATUS_LABELS)
        ;
    }

    /**
     * Display Order.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('order_show')) {
            return abort(401);
        }

        $order = Order::findOrFail($id);

        return view('orders.show')
            ->with('order', $order)
            ->with('status_labels', Order::STATUS_LABELS)
        ;
    }
}
