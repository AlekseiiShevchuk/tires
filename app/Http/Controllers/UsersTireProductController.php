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

        $brand = $tire_product->brand->id;

        $images = [];

        for ($i = 1; $i <= 6; $i++) {
        	$value = 'image_' . $i;
        	if (!is_null($tire_product->{$value})) {
        		$images[] = $tire_product->{$value};
        	}
        }

        $related_tire_products = TireProduct::where([
            'brand_id' => $brand,
        ])->limit(4)->inRandomOrder()->get();

        return view('user_tire_product.show')
        	->with('tire_product', $tire_product)
        	->with('images', $images)
        	->with('related_tire_products', $related_tire_products);
    }
}

