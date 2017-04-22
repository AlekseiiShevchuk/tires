<?php

namespace App\Http\Controllers;

use App\CarModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreCarModelsRequest;
use App\Http\Requests\UpdateCarModelsRequest;

class CarModelsController extends Controller
{
    /**
     * Display a listing of CarModel.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('car_model_access')) {
            return abort(401);
        }

        $car_models = CarModel::all();

        return view('car_models.index', compact('car_models'));
    }

    /**
     * Show the form for creating new CarModel.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('car_model_create')) {
            return abort(401);
        }
        $relations = [
            'car_brands' => \App\CarBrand::get()->pluck('name', 'id')->prepend('Please select', ''),
            'tires' => \App\Tire::get()->pluck('description', 'id'),
        ];

        return view('car_models.create', $relations);
    }

    /**
     * Store a newly created CarModel in storage.
     *
     * @param  \App\Http\Requests\StoreCarModelsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCarModelsRequest $request)
    {
        if (! Gate::allows('car_model_create')) {
            return abort(401);
        }
        $car_model = CarModel::create($request->all());
        $car_model->tires()->sync(array_filter((array)$request->input('tires')));

        foreach ($request->input('car_numbers', []) as $data) {
            $car_model->carNumber()->create($data);
        }

        return redirect()->route('car_models.index');
    }


    /**
     * Show the form for editing CarModel.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('car_model_edit')) {
            return abort(401);
        }
        $relations = [
            'car_brands' => \App\CarBrand::get()->pluck('name', 'id')->prepend('Please select', ''),
            'tires' => \App\Tire::get()->pluck('description', 'id'),
        ];

        $car_model = CarModel::findOrFail($id);

        return view('car_models.edit', compact('car_model') + $relations);
    }

    /**
     * Update CarModel in storage.
     *
     * @param  \App\Http\Requests\UpdateCarModelsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCarModelsRequest $request, $id)
    {
        if (! Gate::allows('car_model_edit')) {
            return abort(401);
        }
        $car_model = CarModel::findOrFail($id);
        $car_model->update($request->all());
        $car_model->tires()->sync(array_filter((array)$request->input('tires')));

        $carNumbers           = $car_model->carNumber;
        $currentCarNumberData = [];
        foreach ($request->input('car_numbers', []) as $index => $data) {
            if (is_integer($index)) {
                $car_model->carNumber()->create($data);
            } else {
                $id                          = explode('-', $index)[1];
                $currentCarNumberData[$id] = $data;
            }
        }
        foreach ($carNumbers as $item) {
            if (isset($currentCarNumberData[$item->id])) {
                $item->update($currentCarNumberData[$item->id]);
            } else {
                $item->delete();
            }
        }

        return redirect()->route('car_models.index');
    }


    /**
     * Display CarModel.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('car_model_view')) {
            return abort(401);
        }
        $relations = [
            'car_brands' => \App\CarBrand::get()->pluck('name', 'id')->prepend('Please select', ''),
            'tires' => \App\Tire::get()->pluck('description', 'id'),
            'car_numbers' => \App\CarNumber::where('car_model_id', $id)->get(),
        ];

        $car_model = CarModel::findOrFail($id);

        return view('car_models.show', compact('car_model') + $relations);
    }


    /**
     * Remove CarModel from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('car_model_delete')) {
            return abort(401);
        }
        $car_model = CarModel::findOrFail($id);
        $car_model->delete();

        return redirect()->route('car_models.index');
    }

    /**
     * Delete all selected CarModel at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('car_model_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = CarModel::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
