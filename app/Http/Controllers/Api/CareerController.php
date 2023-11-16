<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\CareerResource;
use App\Models\Career;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

        $careers = Career::get()->all();

        if ($careers) {
            return ApiResponse::sendResponse(200, 'Career Retrieved Successfully', CareerResource::collection($careers));
        }

        return ApiResponse::sendResponse(200, 'Career Not Found', []);
    }
}
