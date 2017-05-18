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
        $user = Auth::user();

        return view('account.account', compact('user'));
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

        if ($user != Auth::user()) {
            throw new Exception("This is not your account");
            
        }

        if (Hash::check($request->password, $user->password)) {
            $user->name = $request->name;
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;

            if ($request->new_password) {
                $user->password = Hash::make($request->new_password_confirmation);
            }

            $user->save();

            return redirect()->route('index_route');
        }
    }
}
