<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Contact;
use App\Http\Requests\ContactRequest;
use RealRashid\SweetAlert\Facades\Alert;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $contacts = Contact::all();
//return view('layouts.auth');
        return view('contacts.index', ['contacts' => $contacts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ContactRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ContactRequest $request)
    {
        $check_contact_name = Contact::whereName($request->input('name'))->count();
        $check_contact_email = Contact::whereEmail($request->input('email'))->count();

        if ($check_contact_name > 0 or $check_contact_email > 0) {
            Alert::error('Error!', "Name or e-mail already registered in our system.");
            return view('contacts.create');
        }

        $contact = new Contact;
        $contact->name = $request->input('name');
        $contact->contact = $request->input('contact');
        $contact->email = $request->input('email');
        $contact->save();

        return redirect()->route('contacts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        return view('contacts.show', ['contact' => $contact]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        return view('contacts.edit', ['contact' => $contact]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ContactRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ContactRequest $request, $id)
    {
        $contact = Contact::findOrFail($id);

        $check_contact_name = Contact::whereName($request->input('name'))->where('id', '<>', $id)->count();
        $check_contact_email = Contact::whereEmail($request->input('email'))->where('id', '<>', $id)->count();

        if ($check_contact_name > 0 or $check_contact_email > 0) {
            Alert::error('Error!', "Name or e-mail already registered in our system.");
            return view('contacts.edit', ['contact' => $contact]);
        }

        $contact->name = $request->input('name');
        $contact->contact = $request->input('contact');
        $contact->email = $request->input('email');
        $contact->save();

        return redirect()->route('contacts.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('contacts.index');
    }
}
