<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TireProduct;

class IndexController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tires = TireProduct::query();
        
        /*if ($request->get('search')) {
            $products = $products->where('name', 'like', '%' . $request->get('search') . '%');
        }
        if ($request->get('sort') == 'priceHF') {
            $products = $products->orderBy('old_price', 'desc');
        }
        if ($request->get('sort') == 'priceLF') {
            $products = $products->orderBy('old_price', 'asc');
        }
        if ($request->get('sort') == 'nameAZ') {
            $products = $products->orderBy('name', 'asc');
        }
        if ($request->get('sort') == 'nameZA') {
            $products = $products->orderBy('name', 'desc');
        }*/
        
        $tires = $tires->paginate(16);

        return view('index', compact('tires'));
    }
}
