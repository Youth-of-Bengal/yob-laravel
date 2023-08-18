<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AlbumFormRequest;
use App\Models\Album;
use App\Models\AlbumImages;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function index()
    {
        $albums = Album::all();
        return view('admin.gallery.index', compact('albums'));
        // $allImages = [];
        // foreach ($albums as $key => $album) {
        //     $albumImages = Album::find($album->id)->getImages;
        //     $allImages[$key] = $albumImages;
        // }
        // dd($allImages);
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(AlbumFormRequest $request)
    {
        $album = Album::create($request->all());
        foreach ($request->images as $image) {
            $album_name = $album->album_name; 
            $filename = $image->store('/public/gallery/'.$album_name.'/');
            AlbumImages::create([
                'album_id' => $album->id,
                'filename' => $filename
            ]);
        }
        // dd($album);
        return redirect('admin/all-album')->with('message', 'Album Added Successfully');
    }
}
