<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreOrderRequest;
use App\Order;
use App\PreOrder;
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
     * Show list of user orders.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::orderBy('id', 'DESC')->where('user_id', Auth::user()->id)->get();

        return view('users_orders.index')
            ->with('orders', $orders)
            ->with('status_labels', Order::STATUS_LABELS)
        ;
    }

    /**
     * Show list of user orders.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::findOrFail($id);

        $tires = $order->tires()->paginate(5);

        return view('users_orders.show')
            ->with('order', $order)
            ->with('status_labels', Order::STATUS_LABELS)
            ->with('tires', $tires)
        ;
    }

    /**
     * Store a newly created Order and OrderTires for junction table.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        $pre_order = PreOrder::findOrFail($request->pre_order);
        $pre_order->is_confirmed = PreOrder::CONFIRMED;
        $pre_order->save(); 

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

        $request->session()->forget('price');
        $request->session()->forget('pre_order');
        $request->session()->forget('tires');
        $request->session()->forget('isForOrder');

        session(['order_identifier' => $order->identifier]);

        return redirect()->route('order_confirmed');
    }
}

