<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Order;


class AjaxController extends Controller
{
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
}
