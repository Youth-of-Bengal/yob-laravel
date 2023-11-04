<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;

class FrontNewsController extends Controller
{
    public function index()
    {
        $news = News::all();
        return view('frontend.news', compact('news'));
    }
}
