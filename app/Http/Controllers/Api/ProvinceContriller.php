<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProvinceResource;
use App\Models\Province;
use Illuminate\Http\Request;

class ProvinceContriller extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $provinces = Province::get()->all();

        if ($provinces) {
            return ApiResponse::sendResponse(200, 'Career Retrieved Successfully', ProvinceResource::collection($provinces));
        }

        return ApiResponse::sendResponse(200, 'Career Not Found', []);
    }
}
