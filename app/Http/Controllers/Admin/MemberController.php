<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    public function index()
    {   
        $user = Auth::user();
        $member = $user->member;
        dd($member);
        return view('frontend.member', compact('member', 'user'));
    }
}
