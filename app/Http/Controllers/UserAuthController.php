<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthController extends Controller
{
    /**
     * Show the forms for login or register.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::check()) {
        	return view('user_auth.index');
        }
    }

    /**
     * Save email to session before create account.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function saveEmailToSession(Request $request)
    {
        session(['email' => $request->email]);

        return redirect()->route('create_account');
    }

    /**
     * Show the forms for register.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data = ['email' => $request->session()->get('email')];

        return view('user_auth.create', compact('data'));
    }

    /**
     * Redirect user by role.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function redirect()
    {
        if (Auth::check()) {
            switch (Auth::user()->role_id) {
                case 1:
                    return redirect('/home');
                    break;
                
                case 2:
                    return redirect('/');
                    break;
            }
        }
    }
}
