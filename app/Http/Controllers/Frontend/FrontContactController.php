<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\UserContactFormRequest;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\User;
use App\Models\UserContact;

class FrontContactController extends Controller
{
    public function index()
    {
        $contact = Contact::all();
        return view('frontend.contact', compact('contact'));
    }

    public function store(UserContactFormRequest $request)
    {
        $data = $request->validated();
        
        $contact = new UserContact();
        $contact->name = $data['name'];
        $contact->email = $data['email'];
        $contact->phone_no = $data['phone_no'];
        $contact->message = $data['message'];

        $contact->save();

        return redirect('/contact#user_contact')->with('message', 'Message Sent Successfully');
    }
}
