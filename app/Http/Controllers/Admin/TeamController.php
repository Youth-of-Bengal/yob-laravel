<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TeamFormRequest;
use App\Models\Department;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TeamController extends Controller
{
    public function index()
    {
        $team = Team::all();
        return view('admin.about.team.index', compact('team'));
    }
    public function create()
    {
        $departments = Department::all();
        return view('admin.about.team.create', compact('departments'));
    }

    public function store(TeamFormRequest $request)
    {
        $data = $request->validated();
        $team = new Team;
        $departmentName = $data['department'];
        $department = Department::where('department', $departmentName)->first();
        $team->department_id = $department->id;
        $team->name = $data['name'];
        $team->social_link = $data['social_link'];
        $team->ngo_role = $data['ngo_role'];
        $team->profession = $data['profession'];
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $filename = $file->store('/public/team/');
            $team->image = $filename;
        }
        $team->save();

        return redirect('admin/about/team')->with('message', 'Team Member Added Successfully');
    }

    public function edit($team_member_id)
    {
        $team_member = Team::find($team_member_id);
        $departments = Department::all();
        return view('admin.about.team.edit', compact('team_member', 'departments'));
    }

    public function update(TeamFormRequest $request, $team_member_id)
    {
        $data = $request->validated();
        dd($data);
        $team_member = Team::find($team_member_id);
        $team_member->name = $data['name'];
        $team_member->name = $data['social_link'];
        $departmentName = $data['department'];
        $department = Department::where('department', $departmentName)->first();
        $team_member->department_id = $department->id;
        $team_member->name = $data['ngo_role'];
        $team_member->name = $data['profession'];
        if ($request->hasfile('image')) {
            $destination = 'uploads/team/' . $team_member->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/team/', $filename);
            $team_member->image = $filename;
        } else {
            $data['image'] = $team_member->image;
        }
        $team_member->update();

        return redirect('admin/about/team')->with('message', 'Team Member Updated Successfully');
    }

    public function destroy($team_member_id)
    {
        $team_member = Team::find($team_member_id);
        if ($team_member) {
            $team_member->delete();
            return redirect('admin/about/team')->with('message', 'Team Member Deleted Successfully');
        } else {
            return redirect('admin/about/team')->with('message', 'No Team Member Id Found');
        }
    }
}
