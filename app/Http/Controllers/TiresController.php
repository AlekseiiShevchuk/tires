<?php

namespace App\Http\Controllers;

use App\Tire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreTiresRequest;
use App\Http\Requests\UpdateTiresRequest;

class TiresController extends Controller
{
    /**
     * Display a listing of Tire.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('tire_access')) {
            return abort(401);
        }

        $tires = Tire::all();

        return view('tires.index', compact('tires'));
    }

    /**
     * Show the form for creating new Tire.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('tire_create')) {
            return abort(401);
        }
        return view('tires.create');
    }

    /**
     * Store a newly created Tire in storage.
     *
     * @param  \App\Http\Requests\StoreTiresRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTiresRequest $request)
    {
        if (! Gate::allows('tire_create')) {
            return abort(401);
        }
        $tire = Tire::create($request->all());


        return redirect()->route('tires.index');
    }


    /**
     * Show the form for editing Tire.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('tire_edit')) {
            return abort(401);
        }
        $tire = Tire::findOrFail($id);

        return view('tires.edit', compact('tire'));
    }

    /**
     * Update Tire in storage.
     *
     * @param  \App\Http\Requests\UpdateTiresRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTiresRequest $request, $id)
    {
        if (! Gate::allows('tire_edit')) {
            return abort(401);
        }
        $tire = Tire::findOrFail($id);
        $tire->update($request->all());


        return redirect()->route('tires.index');
    }


    /**
     * Display Tire.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('tire_view')) {
            return abort(401);
        }
        $relations = [
            'car_models' => \App\CarModel::whereHas('tires',
                    function ($query) use ($id) {
                        $query->where('id', $id);
                    })->get(),
        ];

        $tire = Tire::findOrFail($id);

        return view('tires.show', compact('tire') + $relations);
    }


    /**
     * Remove Tire from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('tire_delete')) {
            return abort(401);
        }
        $tire = Tire::findOrFail($id);
        $tire->delete();

        return redirect()->route('tires.index');
    }

    /**
     * Delete all selected Tire at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('tire_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Tire::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
