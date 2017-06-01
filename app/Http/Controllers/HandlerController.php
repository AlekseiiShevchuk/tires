<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PreOrder;
use App\Order;
use App\TireBrand;
use App\TireSize;

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

        $price = 0;

        foreach ($pre_order->tires as $tire) {
            $price += $tire->special_price ? $tire->special_price : $tire->price;
        }

        $tires = [];

        $data = $pre_order->tires->toArray();

        $tires = array_map("unserialize", array_unique(array_map("serialize", $data)));

        foreach ($tires as $key => $value) {
            $tires[$key]['count'] = 0;
            $tires[$key]['price'] = 0;
            $tires[$key]['brand'] = TireBrand::findOrFail($tires[$key]['brand_id'])->toArray();
            $tires[$key]['size'] = TireSize::findOrFail($tires[$key]['size_id'])->toArray();
            foreach ($data as $k => $row) {
              if ($value == $row) {
                ++$tires[$key]['count'];
                $tires[$key]['price'] += $row['special_price'] ? $row['special_price'] : $row['price'];
              }
            }
        }

        //echo "<pre>"; print_r($tires); die();

        return view('handler.order_form')
            ->with('pre_order', $pre_order)
            ->with('price', $price)
            ->with('delivery', Order::DELIVERY_LABELS)
            ->with('tires', $tires)
        ;
    }
}
