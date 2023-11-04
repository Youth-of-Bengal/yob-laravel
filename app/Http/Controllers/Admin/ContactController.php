<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ContactFormRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function update(ContactFormRequest $request)
    {
        $data = $request->validated();
        $contact = Contact::find(1);
        $contact->address = $data['address'];
        $contact->phone_no = $data['phone_no'];
        $contact->email = $data['email'];
        $contact->website_name = $data['website_name'];
        $contact->map_url = $data['map_url'];

        $contact->update();
        return redirect('admin.pages.contact', compact('contact'));
    }

}
