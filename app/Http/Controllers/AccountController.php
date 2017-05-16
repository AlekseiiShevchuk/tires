<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateAccountRequest;

class AccountController extends Controller
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
        if (Auth::check()) {
        	$user = Auth::user();

        	return view('account.account', compact('user'));
        }
    }

    /**
     * Update User in storage.
     *
     * @param  \App\Http\Requests\UpdateAccountRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAccountRequest $request, $id)
    {
        $user = User::findOrFail($id);

        if (Hash::check($request->password, $user->password)) {

            /*if (!empty($request->new_password) && !empty($request->new_password_confirm)) {
                die('opoo');
                $request->password = Hash::make($request->new_password_confirm);
            }

            $user->update($request->all());*/

            return redirect()->route('index_route');
        }
    }
}
