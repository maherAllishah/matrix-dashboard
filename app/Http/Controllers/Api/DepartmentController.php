<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\DepartmentResource;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{

    public function __invoke(Request $request): \Illuminate\Http\JsonResponse
    {
        $department = Department::all();
        if ($department) {
            return ApiResponse::sendResponse(200, 'Departments Retrieved Successfully', DepartmentResource::collection($department));
        }

        return ApiResponse::sendResponse(200, 'Departments Not Found', []);
    }

}
