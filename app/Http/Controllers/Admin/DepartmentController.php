<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DepartmentFormRequest;
use App\Models\Department;
use App\Models\Departments;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $department = Department::all();
        return view('admin.about.departments.index', compact('department'));
    }

    public function create()
    {
        return view('admin.about.departments.create');
    }

    public function store(DepartmentFormRequest $request)
    {
        $data = $request->validated();

        $department = new Department;
        $department->department = $data['department'];
        $department->save();

        return redirect('admin/about/departments')->with('message', 'Department Added Successfully');
    }

    public function edit($department_id)
    {
        $department = Department::find($department_id);
        return view('admin.about.departments.edit', compact('department'));
    }

    public function update(DepartmentFormRequest $request, $department_id)
    {
        $data = $request->validated();

        $department = Department :: find($department_id);
        $department->department = $data['department'];
        $department->update();

        return redirect('admin/about/departments')->with('message', 'Department Updated Successfully');
    }

    public function destroy($category_id)
    {
        $department = Department::find($category_id);
        if($department)
        {
            $department->delete();
            return redirect('admin/about/departments')->with('message', 'Department Deleted Successfully');
        }
        else
        {
            return redirect('admin/about/departments')->with('message', 'No Department Id Found');
        }
    }
}
