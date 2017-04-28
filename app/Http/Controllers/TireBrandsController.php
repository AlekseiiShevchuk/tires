<?php

namespace App\Http\Controllers;

use App\TireBrand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreTireBrandsRequest;
use App\Http\Requests\UpdateTireBrandsRequest;

class TireBrandsController extends Controller
{
    /**
     * Display a listing of TireBrand.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('tire_brand_access')) {
            return abort(401);
        }

        $tire_brands = TireBrand::all();

        return view('tire_brands.index', compact('tire_brands'));
    }

    /**
     * Show the form for creating new TireBrand.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('tire_brand_create')) {
            return abort(401);
        }
        return view('tire_brands.create');
    }

    /**
     * Store a newly created TireBrand in storage.
     *
     * @param  \App\Http\Requests\StoreTireBrandsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTireBrandsRequest $request)
    {
        if (! Gate::allows('tire_brand_create')) {
            return abort(401);
        }
        $tire_brand = TireBrand::create($request->all());


        return redirect()->route('tire_brands.index');
    }


    /**
     * Show the form for editing TireBrand.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('tire_brand_edit')) {
            return abort(401);
        }
        $tire_brand = TireBrand::findOrFail($id);

        return view('tire_brands.edit', compact('tire_brand'));
    }

    /**
     * Update TireBrand in storage.
     *
     * @param  \App\Http\Requests\UpdateTireBrandsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTireBrandsRequest $request, $id)
    {
        if (! Gate::allows('tire_brand_edit')) {
            return abort(401);
        }
        $tire_brand = TireBrand::findOrFail($id);
        $tire_brand->update($request->all());


        return redirect()->route('tire_brands.index');
    }


    /**
     * Display TireBrand.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('tire_brand_view')) {
            return abort(401);
        }
        $relations = [
            'tire_products' => \App\TireProduct::where('brand_id', $id)->get(),
        ];

        $tire_brand = TireBrand::findOrFail($id);

        return view('tire_brands.show', compact('tire_brand') + $relations);
    }


    /**
     * Remove TireBrand from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('tire_brand_delete')) {
            return abort(401);
        }
        $tire_brand = TireBrand::findOrFail($id);
        $tire_brand->delete();

        return redirect()->route('tire_brands.index');
    }

    /**
     * Delete all selected TireBrand at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('tire_brand_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = TireBrand::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
