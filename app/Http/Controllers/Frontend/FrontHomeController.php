<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Home;
use App\Models\News;
use App\Models\Project;
use Illuminate\Http\Request;

class FrontHomeController extends Controller
{
    public function index()
    {
        $homedata = Home::find(1);
        $projects = Project::all();
        $newses = News::all();
        return view('frontend.index', compact('projects','newses', 'homedata'));   
    }
}
