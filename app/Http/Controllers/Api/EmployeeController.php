<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Trait\UploadImageInApi;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    use UploadImageInApi;

    public function __invoke(Request $request)
    {

        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:employees,email,NULL,id,career_id,' . $request->input('career_id'),
            'phone' => 'required|string',
            'career_id' => 'required|exists:careers,id',
            'file_one_path' => 'required'
        ]);
        $employee = Employee::create($request->except('file_one_path', 'file_two_path'));

        if ($request->file('file_one_path')) {
            $employee->update(['file_one_path' => $this->upload($request->file('file_one_path'), 'employ_files')]);

        }

        if ($request->file('file_two_path')) {
            $employee->update(['file_two_path' => $this->upload($request->file('file_two_path'), 'employ_files')]);

        }

        return ApiResponse::sendResponse(201, 'Employee added successfully.', $employee);
    }
}
