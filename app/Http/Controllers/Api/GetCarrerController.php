<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Models\Career;
use Illuminate\Http\Request;

class GetCarrerController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, $career_id)
    {
        $career = Career::where('id', $career_id)->first();

        if ($career) {
            return ApiResponse::sendResponse(200,
                'Career Retrieved Successfully',
                $career);
        }

        return ApiResponse::sendResponse(200, 'Career Not Found', []);
    }
}
