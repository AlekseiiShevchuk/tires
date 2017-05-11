<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TireProduct;

class UsersTireProductController extends Controller
{
    /**
     * Display Product.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tire_product = TireProduct::findOrFail($id);

        $images = [];

        for ($i = 1; $i <= 6; $i++) {
        	$value = 'image_' . $i;
        	if (!is_null($tire_product->{$value})) {
        		$images[] = $tire_product->{$value};
        	}
        }

        return view('user_tire_product.show', compact('tire_product'), compact('images'));
    }
}

