<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('handler.order_from');
    }
}
