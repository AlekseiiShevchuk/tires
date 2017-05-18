<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountSettingsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for editing account params.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('account_settings.index');
    }
}
