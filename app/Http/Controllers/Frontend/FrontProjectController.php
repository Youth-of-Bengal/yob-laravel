<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class FrontProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('frontend.projects', compact('projects'));
    }
}
