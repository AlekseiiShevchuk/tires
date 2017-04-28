<?php

namespace App\Http\Controllers;

use App\TireProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreTireProductsRequest;
use App\Http\Requests\UpdateTireProductsRequest;
use App\Http\Controllers\Traits\FileUploadTrait;

class TireProductsController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of TireProduct.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('tire_product_access')) {
            return abort(401);
        }

        $tire_products = TireProduct::all();

        return view('tire_products.index', compact('tire_products'));
    }

    /**
     * Show the form for creating new TireProduct.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('tire_product_create')) {
            return abort(401);
        }
        $relations = [
            'brands' => \App\TireBrand::get()->pluck('name', 'id')->prepend('Please select', ''),
            'sizes' => \App\TireSize::get()->pluck('size', 'id')->prepend('Please select', ''),
        ];

        return view('tire_products.create', $relations);
    }

    /**
     * Store a newly created TireProduct in storage.
     *
     * @param  \App\Http\Requests\StoreTireProductsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTireProductsRequest $request)
    {
        if (! Gate::allows('tire_product_create')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $tire_product = TireProduct::create($request->all());


        return redirect()->route('tire_products.index');
    }


    /**
     * Show the form for editing TireProduct.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('tire_product_edit')) {
            return abort(401);
        }
        $relations = [
            'brands' => \App\TireBrand::get()->pluck('name', 'id')->prepend('Please select', ''),
            'sizes' => \App\TireSize::get()->pluck('size', 'id')->prepend('Please select', ''),
        ];

        $tire_product = TireProduct::findOrFail($id);

        return view('tire_products.edit', compact('tire_product') + $relations);
    }

    /**
     * Update TireProduct in storage.
     *
     * @param  \App\Http\Requests\UpdateTireProductsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTireProductsRequest $request, $id)
    {
        if (! Gate::allows('tire_product_edit')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $tire_product = TireProduct::findOrFail($id);
        $tire_product->update($request->all());


        return redirect()->route('tire_products.index');
    }


    /**
     * Display TireProduct.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('tire_product_view')) {
            return abort(401);
        }
        $relations = [
            'brands' => \App\TireBrand::get()->pluck('name', 'id')->prepend('Please select', ''),
            'sizes' => \App\TireSize::get()->pluck('size', 'id')->prepend('Please select', ''),
        ];

        $tire_product = TireProduct::findOrFail($id);

        return view('tire_products.show', compact('tire_product') + $relations);
    }


    /**
     * Remove TireProduct from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('tire_product_delete')) {
            return abort(401);
        }
        $tire_product = TireProduct::findOrFail($id);
        $tire_product->delete();

        return redirect()->route('tire_products.index');
    }

    /**
     * Delete all selected TireProduct at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('tire_product_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = TireProduct::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
