<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserContact;
use Illuminate\Http\Request;

class UserContactController extends Controller
{
    public function index()
    {
        $user_contacts = UserContact::all();
        return view('admin.user_contact_details', compact('user_contacts'));
    }
}
