<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PreOrder;
use App\Order;

class HandlerController extends Controller
{
    /**
     * Redirect user to address settings before save tires to order
     *
     * @return \Illuminate\Http\Response
     */
    public function order(Request $request)
    {
        session([
        	'isForOrder' => true,
        	'price' => $request->price,
        	'tires' => $request->tires,
        	'pre_order' => $request->pre_order
        ]);

        return redirect()->route('account-address.store');
    }

    /**
     * Get the from which send request to create order
     *
     * @return \Illuminate\Http\Response
     */
    public function orderForm()
    {
        $pre_order = PreOrder::findOrFail(session('pre_order'));

        $total_price = 0;

        foreach ($pre_order->tires as $tire) {
            $total_price += $tire->special_price ? $tire->special_price : $tire->price;
        }

        $delivery = Order::DELIVERY_LABELS;

        return view('handler.order_from')
            ->with('pre_order', $pre_order)
            ->with('total_price', $total_price)
            ->with('delivery', $delivery)
        ;
    }
}
