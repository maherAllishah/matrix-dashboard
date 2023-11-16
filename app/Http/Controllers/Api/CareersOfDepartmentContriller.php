<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\CareerResource;
use App\Models\Career;
use Illuminate\Http\Request;

class CareersOfDepartmentContriller extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, $dep_id)
    {

        $careers = Career::where('department_id', $dep_id)->get();
        if (count($careers) > 0) {
            return ApiResponse::sendResponse(200,
                'Careers Retrieved Successfully',
                CareerResource::collection($careers));
        }

        return ApiResponse::sendResponse(200, 'Career Not Found', []);
    }
}
