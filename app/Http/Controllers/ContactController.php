<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function submitForm(Request $request)
    {
        //dd($request);

        $contact = new Contact;
        $contact->c_fname = $request->input('c_fname');
        $contact->c_lname = $request->input('c_lname');
        $contact->c_email = $request->input('c_email');
        $contact->c_subject = $request->input('c_subject');
        $contact->c_message = $request->input('c_message');
        $contact->save();

        return redirect()->back()->with('success', 'Message sent successfully!');
    }
}
