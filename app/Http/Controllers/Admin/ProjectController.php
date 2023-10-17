<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProjectFormRequest;
use App\Models\Project;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('admin.project.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.project.create');
    }

    public function store(ProjectFormRequest $request)
    {
        $data = $request->validated();

        $project = new Project();
        $project->name = $data['name'];
        $project->coordinator = $data['coordinator'];
        $project->description = $data['description'];

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $filename = $file->store('/public/project/');
            $project->image = $filename;
        }

        $project->save();

        return redirect('admin/all-project')->with('message', 'Project Added Successfully');
    }

    public function edit($project_id)
    {
        $project = Project::find($project_id);
        return view('admin.project.edit', compact('project'));
    }

    public function update(ProjectFormRequest $request, $project_id)
    {
        $data = $request->validated();

        $project = Project :: find($project_id);
        $project->name = $data['name'];
        $project->description = $data['description'];

        if ($request->hasfile('image')) {
            $destination = $project->image;
            if (Storage::exists($destination)) {
                Storage::delete($destination);
            }
            $file = $request->file('image');
            $filename = $file->store('/public/project/');
            $project->image = $filename;
        }
        else {
            $data['image'] = $project->image; 
        }
        $project->update();

        return redirect('admin/all-project')->with('message', 'Project Updated Successfully');
    }

    public function destroy($project_id)
    {
        $project = Project::find($project_id);
        if($project)
        {
            $destination = $project->image;
            if(Storage::exists($destination)){
                Storage::delete($destination);
            }
            $project->delete();
            return redirect('admin/all-project')->with('message', 'Project Deleted Successfully');
        }
        else
        {
            return redirect('admin/all-project')->with('message', 'No Project Id Found');
        }
    }
}
