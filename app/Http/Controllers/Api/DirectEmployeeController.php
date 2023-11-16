<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Trait\UploadImageInApi;
use App\Models\DirectEmployee;
use Illuminate\Http\Request;

class DirectEmployeeController extends Controller
{
    use UploadImageInApi;

    public function __invoke(Request $request)
    {

        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'file_one_path' => 'required'
        ]);
        $employee = DirectEmployee::create($request->except('file_one_path', 'file_two_path'));
        if ($request->file('file_one_path')) {
            $employee->update(['file_one_path' => $this->upload($request->file('file_one_path'), 'direct_employ_files')]);

        }

        if ($request->file('file_two_path')) {
            $employee->update(['file_two_path' => $this->upload($request->file('file_two_path'), 'direct_employ_files')]);

        }

        return ApiResponse::sendResponse(201, 'Employee added successfully.', $employee);
    }
}
