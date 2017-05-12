<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactSubject;
use App\Contact;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    /**
     * Show the contact form.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts_subjects = ContactSubject::all();

        return view('contacts.index')->with('contacts_subjects', $contacts_subjects);
    }

    /**
     * Store a newly created TireProduct in storage.
     *
     * @param  \App\Http\Requests\StoreTireProductsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = Auth::check() ? Auth::user()->id : null;
        $contact = new Contact();
        $contact->email_from = $request->email_from;
        $contact->order_reference = $request->order_reference;
        $contact->message = $request->message;
        $contact->subject_id = $request->subject_id;
        $contact->user_id = $user_id;
        $contact->save();

        return redirect()->route('index_route');
    }
}
