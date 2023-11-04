<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Album;
use Illuminate\Http\Request;

class FrontGalleryController extends Controller
{
    public function index()
    {
        $albums = Album::all();
        return view('frontend.gallery', compact('albums'));
    }
}
