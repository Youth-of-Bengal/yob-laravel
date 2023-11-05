<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DescriptionFormRequest;
use App\Models\Description;
use Illuminate\Http\Request;

class DescriptionController extends Controller
{
    public function index()
    {
        $description = Description::find(1);
        return view('admin.about.description.edit', compact('description'));
    }

    public function update(DescriptionFormRequest $request)
    {
        $data = $request->validated();
        $description = Description::find(1);
        $description->description = $data['description'];

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $filename = $file->store('/public/about/description/');
            $description->image = $filename;
        }

        $description->update();

        return redirect('admin/about/description/1')->with('message', 'Updated Successfully');
    }
}
