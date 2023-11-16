<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\SettingsBusinessPartnerResource;
use App\Models\SettingsOfBusinessPartners;
use Illuminate\Http\Request;

class SettingsBusinessPartnerController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

        $settings = SettingsOfBusinessPartners::orderBy('id', 'desc')->first();

        if ($settings) {
            return ApiResponse::sendResponse(200, 'Settings Retrieved Successfully', new SettingsBusinessPartnerResource($settings));
        }

        return ApiResponse::sendResponse(200, 'Settings Not Found', []);

    }
}
