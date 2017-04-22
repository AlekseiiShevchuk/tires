<?php

namespace App\Http\Controllers;

use App\CarNumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreCarNumbersRequest;
use App\Http\Requests\UpdateCarNumbersRequest;

class CarNumbersController extends Controller
{
    /**
     * Display a listing of CarNumber.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('car_number_access')) {
            return abort(401);
        }

        $car_numbers = CarNumber::all();

        return view('car_numbers.index', compact('car_numbers'));
    }

    /**
     * Show the form for creating new CarNumber.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('car_number_create')) {
            return abort(401);
        }
        $relations = [
            'car_models' => \App\CarModel::get()->pluck('description', 'id')->prepend('Please select', ''),
        ];

        return view('car_numbers.create', $relations);
    }

    /**
     * Store a newly created CarNumber in storage.
     *
     * @param  \App\Http\Requests\StoreCarNumbersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCarNumbersRequest $request)
    {
        if (! Gate::allows('car_number_create')) {
            return abort(401);
        }
        $car_number = CarNumber::create($request->all());


        return redirect()->route('car_numbers.index');
    }


    /**
     * Show the form for editing CarNumber.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('car_number_edit')) {
            return abort(401);
        }
        $relations = [
            'car_models' => \App\CarModel::get()->pluck('description', 'id')->prepend('Please select', ''),
        ];

        $car_number = CarNumber::findOrFail($id);

        return view('car_numbers.edit', compact('car_number') + $relations);
    }

    /**
     * Update CarNumber in storage.
     *
     * @param  \App\Http\Requests\UpdateCarNumbersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCarNumbersRequest $request, $id)
    {
        if (! Gate::allows('car_number_edit')) {
            return abort(401);
        }
        $car_number = CarNumber::findOrFail($id);
        $car_number->update($request->all());


        return redirect()->route('car_numbers.index');
    }


    /**
     * Display CarNumber.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('car_number_view')) {
            return abort(401);
        }
        $relations = [
            'car_models' => \App\CarModel::get()->pluck('description', 'id')->prepend('Please select', ''),
        ];

        $car_number = CarNumber::findOrFail($id);

        return view('car_numbers.show', compact('car_number') + $relations);
    }


    /**
     * Remove CarNumber from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('car_number_delete')) {
            return abort(401);
        }
        $car_number = CarNumber::findOrFail($id);
        $car_number->delete();

        return redirect()->route('car_numbers.index');
    }

    /**
     * Delete all selected CarNumber at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('car_number_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = CarNumber::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
