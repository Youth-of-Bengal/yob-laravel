<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AlbumFormRequest;
use App\Models\Album;
use App\Models\AlbumImages;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlbumController extends Controller
{
    public function index()
    {
        $albums = Album::all();
        return view('admin.gallery.index', compact('albums'));
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
        return redirect('admin/all-album')->with('message', 'Album Added Successfully');
    }

    public function viewAlbum($album_id)
    {
        $album = Album::findOrFail($album_id);
        $allImages = $album->getImages;
        return view('admin.gallery.view', compact('album', 'allImages'));
    }

    public function edit($album_id)
    {
        $album = Album::findOrFail($album_id);
        $allImages = $album->getImages;
        return view('admin.gallery.edit', compact('album', 'allImages'));
    }

    public function deleteSingleImage($image_id) {
        $albumImage = AlbumImages::find($image_id);
        if ($albumImage) {
            $destination = $albumImage->filename; // Assuming 'filename' is the column name in the table
            if (Storage::exists($destination)) {
                Storage::delete($destination);
                $albumImage->delete();
            }
            return response()->json(['success' => true]);
        }
        else {
            return response()->json(['success' => false]);
        }
        
    }

    public function update(Request $request, $album_id)
    {
        $data = $request->all();

        $album = Album :: find($album_id);
        $album->album_name = $data['album_name'];

        if(isset($request->images)){
            foreach ($request->images as $image) {
                $album_name = $album->album_name; 
                $filename = $image->store('/public/gallery/'.$album_name.'/');
                AlbumImages::create([
                    'album_id' => $album->id,
                    'filename' => $filename
                ]);
            }
        }        

        $album->update();

        return redirect('admin/all-album')->with('message', 'Album Updated Successfully');
    }

    public function destroy($album_id)
    {
        $album = Album::find($album_id);
        if($album)
        {
            $allImages=$album->getImages;
            $album_name = $album->album_name;
            Storage::deleteDirectory('/public/gallery/'.$album_name);
            foreach ($allImages as $image) {
                $image->delete();
            }
            $album->delete();
            return redirect('admin/all-album')->with('message', 'Album Deleted Successfully');
        }
        else
        {
            return redirect('admin/all-album')->with('message', 'No Album Id Found');
        }
    }
}
