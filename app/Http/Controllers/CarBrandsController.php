<?php

namespace App\Http\Controllers;

use App\CarBrand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreCarBrandsRequest;
use App\Http\Requests\UpdateCarBrandsRequest;

class CarBrandsController extends Controller
{
    /**
     * Display a listing of CarBrand.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('car_brand_access')) {
            return abort(401);
        }

        $car_brands = CarBrand::all();

        return view('car_brands.index', compact('car_brands'));
    }

    /**
     * Show the form for creating new CarBrand.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('car_brand_create')) {
            return abort(401);
        }
        return view('car_brands.create');
    }

    /**
     * Store a newly created CarBrand in storage.
     *
     * @param  \App\Http\Requests\StoreCarBrandsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCarBrandsRequest $request)
    {
        if (! Gate::allows('car_brand_create')) {
            return abort(401);
        }
        $car_brand = CarBrand::create($request->all());

        foreach ($request->input('car_models', []) as $data) {
            $car_brand->carModel()->create($data);
        }

        return redirect()->route('car_brands.index');
    }


    /**
     * Show the form for editing CarBrand.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('car_brand_edit')) {
            return abort(401);
        }
        $car_brand = CarBrand::findOrFail($id);

        return view('car_brands.edit', compact('car_brand'));
    }

    /**
     * Update CarBrand in storage.
     *
     * @param  \App\Http\Requests\UpdateCarBrandsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCarBrandsRequest $request, $id)
    {
        if (! Gate::allows('car_brand_edit')) {
            return abort(401);
        }
        $car_brand = CarBrand::findOrFail($id);
        $car_brand->update($request->all());

        $carModels           = $car_brand->carModel;
        $currentCarModelData = [];
        foreach ($request->input('car_models', []) as $index => $data) {
            if (is_integer($index)) {
                $car_brand->carModel()->create($data);
            } else {
                $id                          = explode('-', $index)[1];
                $currentCarModelData[$id] = $data;
            }
        }
        foreach ($carModels as $item) {
            if (isset($currentCarModelData[$item->id])) {
                $item->update($currentCarModelData[$item->id]);
            } else {
                $item->delete();
            }
        }

        return redirect()->route('car_brands.index');
    }


    /**
     * Display CarBrand.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('car_brand_view')) {
            return abort(401);
        }
        $relations = [
            'car_models' => \App\CarModel::where('car_brand_id', $id)->get(),
        ];

        $car_brand = CarBrand::findOrFail($id);

        return view('car_brands.show', compact('car_brand') + $relations);
    }


    /**
     * Remove CarBrand from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('car_brand_delete')) {
            return abort(401);
        }
        $car_brand = CarBrand::findOrFail($id);
        $car_brand->delete();

        return redirect()->route('car_brands.index');
    }

    /**
     * Delete all selected CarBrand at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('car_brand_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = CarBrand::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
