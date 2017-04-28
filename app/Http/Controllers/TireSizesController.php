<?php

namespace App\Http\Controllers;

use App\TireSize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreTireSizesRequest;
use App\Http\Requests\UpdateTireSizesRequest;

class TireSizesController extends Controller
{
    /**
     * Display a listing of TireSize.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('tire_size_access')) {
            return abort(401);
        }

        $tire_sizes = TireSize::all();

        return view('tire_sizes.index', compact('tire_sizes'));
    }

    /**
     * Show the form for creating new TireSize.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('tire_size_create')) {
            return abort(401);
        }
        return view('tire_sizes.create');
    }

    /**
     * Store a newly created TireSize in storage.
     *
     * @param  \App\Http\Requests\StoreTireSizesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTireSizesRequest $request)
    {
        if (! Gate::allows('tire_size_create')) {
            return abort(401);
        }
        $tire_size = TireSize::create($request->all());


        return redirect()->route('tire_sizes.index');
    }


    /**
     * Show the form for editing TireSize.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('tire_size_edit')) {
            return abort(401);
        }
        $tire_size = TireSize::findOrFail($id);

        return view('tire_sizes.edit', compact('tire_size'));
    }

    /**
     * Update TireSize in storage.
     *
     * @param  \App\Http\Requests\UpdateTireSizesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTireSizesRequest $request, $id)
    {
        if (! Gate::allows('tire_size_edit')) {
            return abort(401);
        }
        $tire_size = TireSize::findOrFail($id);
        $tire_size->update($request->all());


        return redirect()->route('tire_sizes.index');
    }


    /**
     * Display TireSize.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('tire_size_view')) {
            return abort(401);
        }
        $relations = [
            'tire_products' => \App\TireProduct::where('size_id', $id)->get(),
        ];

        $tire_size = TireSize::findOrFail($id);

        return view('tire_sizes.show', compact('tire_size') + $relations);
    }


    /**
     * Remove TireSize from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('tire_size_delete')) {
            return abort(401);
        }
        $tire_size = TireSize::findOrFail($id);
        $tire_size->delete();

        return redirect()->route('tire_sizes.index');
    }

    /**
     * Delete all selected TireSize at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('tire_size_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = TireSize::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
