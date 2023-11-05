<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\AlbumImages;
use Illuminate\Http\Request;

class SingleAlbumImagesController extends Controller
{
    public function index($album_id)
    {
        $album = Album::findOrFail($album_id);
        $allImages = $album->getImages;
        return view('frontend.album-images', compact('album', 'allImages'));
    }
}
