<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\ServiceResource;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $services = Service::all();
        if ($services) {
            return ApiResponse::sendResponse(200, 'Those are all the services', ServiceResource::collection($services));
        } else {
            return ApiResponse::sendResponse(200, 'No Services were found', []);
        }
    }
}
