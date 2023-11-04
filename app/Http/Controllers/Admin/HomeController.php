<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\HomeFormRequest;
use App\Models\Home;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // public function index()
    // {
    //     $projects = Home::all();
    //     return view('admin.home.index', compact('projects'));
    // }

    public function create()
    {
        $home = Home::find(1);
        return view('admin.pages.home', compact('home'));
    }

    public function store(HomeFormRequest $request)
    {
        // dd($request->all());
        $data = $request->validated();

        $home = Home::find(1);
        $home->heading = $data['heading'];
        $home->subheading = $data['subheading'];
        $home->video_url = $data['video_url'];
        $home->served_number = $data['served_number'];
        $home->served_description = $data['served_description'];
        $home->meta_title = $data['meta_title'];
        $home->meta_description = $data['meta_description'];

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $filename = $file->store('/public/pages/home/');
            $home->image = $filename;
        }

        $home->update();

        return redirect('admin/all-home')->with('message', 'Home Added Successfully');
    }
}
