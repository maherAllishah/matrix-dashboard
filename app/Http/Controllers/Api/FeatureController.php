<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\FeatureResource;
use App\Models\Feature;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        
        $features = Feature::all();
        if ($features) {
            return ApiResponse::sendResponse(200, 'those are all the features', FeatureResource::collection($features));
        } else {
            return ApiResponse::sendResponse(200, 'nothing found', []);
        }

    }
}
