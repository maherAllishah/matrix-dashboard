<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CareerRequest;
use App\Mail\EmployeeMail;
use App\Mail\FailMail;
use App\Models\Career;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CareerController extends BaseController
{
    public function __construct()
    {
        parent::__construct(CareerRequest::class);
    }

    protected $model = Career::class;
    protected $resource = 'careers';

    public function create()
    {
        $tags = Tag::all();
        $departments = Department::all();

        return view('admin.pages.careers.career_add', compact('tags', 'departments'));
    }



    public function show($id)
    {
        $data = $this->model::query()->findOrFail($id);
        $tags = Tag::all();
        return view('admin.pages.careers.career_details', compact('data', 'tags'));
    }


    public function edit($id)
    {
        $data = $this->model::query()->findOrFail($id);
        $tags = Tag::all();
        $departments = Department::all();

        return view('admin.pages.careers.career-edit', compact('data', 'tags', 'departments'));
    }

    public function destroy($id)
    {
        $career = $this->model::query()->findOrFail($id);
        $career->employees()->delete();
        $career->delete();

        return redirect()->route('admin.careers.index');
    }

    public function showApplication($dep_id, $career_id)
    {
        $career = Career::where('id', $career_id)->first();

        if (!checkPermission('control admins')) {
            if (!checkPermission('hr permission')) {
                if ($career->department->admin->id !== (Auth::guard('web')->user()->id)) {
                    abort(403);
                }
            }
        }

        $careers = Employee::where('career_id', $career_id)->get();

        return view('admin.pages.careers.career_application', ['dep_id' => $dep_id, 'employees' => $careers, 'career' => $career]);

    }

    public function showApplicationDetails($dep_id, $career_id, $employee_id)
    {
        $career = Career::where('id', $career_id)->first();
        $employee_id = Employee::where('id', $employee_id)->first();

        return view('admin.pages.career.career_appication_details', ['dep_id' => $dep_id, 'employee' => $employee_id, 'career_id' => $career_id, 'career' => $career]);
    }

    public function updateApp(Request $request, $dep_id, $career_id, $employee)
    {

        Employee::where('id', $employee)->update([
            'hr_evaluate' => $request->get('hr_evaluate'),
            'hr_comment' => $request->get('hr_comment'),
            'manager_evaluate' => $request->get('manager_evaluate'),
            'manager_comment' => $request->get('manager_comment'),
        ]);
        $careers = Employee::where('career_id', $career_id)->get();

        return view('admin.pages.career.career_application', ['dep_id' => $dep_id, 'employees' => $careers]);
    }

    public function approve(Request $request, $id)
    {

        $application = Employee::where('id', $id)->first();

        if ($request->status == 'approved') {
            Mail::to('maherh90@gmail.com')->send(new EmployeeMail($application));

        } elseif ($request->status == 'rejected') {
            Mail::to($application->email)->send(new FailMail($application));
        }

    }
}
