<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\ContactSubject;

class ContactsSubjectsController extends Controller
{
    /**
     * Display a listing of ContactsSubjects.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('contact_subject_access')) {
            return abort(401);
        }

        $contacts_subjects = ContactSubject::all();

        return view('contacts_subjects.index', compact('contacts_subjects'));
    }

    /**
     * Show the form for creating new ContactSubject.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('contact_subject_create')) {
            return abort(401);
        }

        return view('contacts_subjects.create');
    }

    /**
     * Store a newly created ContactSubjects in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (! Gate::allows('contact_subject_create')) {
            return abort(401);
        }
        $contact_subject = new ContactSubject();
        $contact_subject->name = $request->name;
        $contact_subject->save();

        return redirect()->route('contacts-subjects.index');
    }

    /**
     * Show the form for editing ContactSubject.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('contact_subject_edit')) {
            return abort(401);
        }

        $contact_subject = ContactSubject::findOrFail($id);

        return view('contacts_subjects.edit', compact('contact_subject'));
    }

    /**
     * Update ContactSubject in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (! Gate::allows('contact_subject_edit')) {
            return abort(401);
        }
        
        $contact_subject = ContactSubject::findOrFail($id);
        $contact_subject->name = $request->name;
        $contact_subject->save();


        return redirect()->route('contacts-subjects.index');
    }

    /**
     * Remove ContactSubject from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('contact_subject_delete')) {
            return abort(401);
        }
        $contact_subject = ContactSubject::findOrFail($id);
        $contact_subject->delete();

        return redirect()->route('contacts-subjects.index');
    }
}
