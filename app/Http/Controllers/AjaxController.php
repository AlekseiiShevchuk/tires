<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Order;
use Illuminate\Support\Facades\Auth;
use App\PreOrder;
use App\PreOrderTire;
use App\TireProduct;


class AjaxController extends Controller
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
     * Update Order in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateOrderStatus(Request $request)
    {
        if (! Gate::allows('order_edit')) {
            return abort(401);
        }

        $order = Order::findOrFail($request->id);
        $order->status = $request->status;
        $order->save();


        return response()->json([
            'response_status' => true,
            'response_id' => $request->id,
            'status_id' => $request->status,
            'status_label' => Order::STATUS_LABELS[$request->status],
            'response_version' => $request->version
        ]);
    }

    /**
     * Add tire to pre order.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addTireToPreOrder(Request $request)
    {
        $data = [
            'response_status' => true
        ];

        $entity = PreOrder::where([
            'user_id' => Auth::user()->id,
            'is_confirmed' => PreOrder::NOT_CONFIRMED
        ])->first();

        if ($entity instanceof PreOrder) {
            $pre_order = $entity;
        } else {
            $pre_order = new PreOrder();
            $pre_order->user_id = Auth::user()->id;
            $pre_order->is_confirmed = PreOrder::NOT_CONFIRMED;
            $pre_order->save();
        }

        $pre_order_tire_entity = PreOrderTire::where([
            'pre_order_id' => $pre_order->id,
            'tire_id' => $request->tire
        ])->first();

        $data['isRepeated'] = $pre_order_tire_entity instanceof PreOrderTire ? true : false;

        $pre_order_tire = new PreOrderTire();
        $pre_order_tire->pre_order_id = $pre_order->id;
        $pre_order_tire->tire_id = $request->tire;
        $pre_order_tire->save();

        $tire = TireProduct::findOrFail($request->tire);

        $data['tire'] = $tire;
        $data['pre_order'] = $pre_order;

        return response()->json($data);
    }
}
