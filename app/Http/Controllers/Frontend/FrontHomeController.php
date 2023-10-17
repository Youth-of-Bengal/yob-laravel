<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class FrontHomeController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('frontend.index', compact('projects'));   
    }
}
