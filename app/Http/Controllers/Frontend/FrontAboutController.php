<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Description;
use App\Models\Team;
use Illuminate\Http\Request;

class FrontAboutController extends Controller
{
    public function index()
    {
        $description = Description::all();
        $members = Team::all();
        return view('frontend.about', compact('description', 'members'));
    }
}
