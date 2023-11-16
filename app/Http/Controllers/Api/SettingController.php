<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\SettingResource;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): \Illuminate\Http\JsonResponse
    {
        $settings = Setting::orderBy('id', 'desc')->first();
        if ($settings) {
            return ApiResponse::sendResponse(200, 'Settings Retrieved Successfully', new SettingResource($settings));
        }

        return ApiResponse::sendResponse(200, 'Settings Not Found', []);
    }
}
