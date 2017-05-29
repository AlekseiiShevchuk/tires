<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateAccountAddressRequest;

class AccountAddressController extends Controller
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
        $user = Auth::user();

        return view('account_address.account', compact('user'));
    }

    /**
     * Update User in storage.
     *
     * @param  \App\Http\Requests\UpdateAccountRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAccountAddressRequest $request, $id)
    {
        $user = User::findOrFail($id);

        if ($user != Auth::user()) {
            throw new Exception("This is not your account");
            
        }

        if (Hash::check($request->password, $user->password)) {
            $user->address = $request->address;
            $user->phone = $request->phone;
            $user->save();

            if ($request->isForOrder) {
                return redirect()->route('order_form');
            } else {
                return redirect()->route('index_route');
            }
        }
    }
}
