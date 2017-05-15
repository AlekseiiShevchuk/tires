<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Hash;

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
        	$user =  Auth::user();

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
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if (Hash::check($request->password, $user->password)) {
            $validationData = [
                'name' => 'required',
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email|unique:users,email,' . $user->id,
                'new_password' => 'same:new_password_confirm|different:password'
            ];

            if (!empty($request->new_password)) {
                $validationData['new_password_confirm'] = 'required|same:new_password|different:password';
            }

            $this->validate($request, $validationData);

            $user->name = $request->name;
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;

            if (!empty($request->new_password) && !empty($request->new_password_confirm)) {
                $user->password = Hash::make($request->new_password_confirm);
            }

            $user->save();

            return redirect()->route('index_route');
        }
    }
}
