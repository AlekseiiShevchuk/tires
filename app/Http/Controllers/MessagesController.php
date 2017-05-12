<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use Illuminate\Support\Facades\Gate;

class MessagesController extends Controller
{
    /**
     * Display a listing of TireProduct.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('messages_access')) {
            return abort(401);
        }

        $messages = Contact::orderBy('id', 'DESC')->get();

        return view('messages.index', compact('messages'));
    }

    /**
     * Display TireProduct.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('messages_access')) {
            return abort(401);
        }

        $message = Contact::findOrFail($id);

        return view('messages.show', compact('message'));
    }
}
