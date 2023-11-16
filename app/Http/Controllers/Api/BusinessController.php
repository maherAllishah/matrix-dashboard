<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Models\Product;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $businesses = Business::query()->get();
        $products = Product::query()->get();
        $data = $businesses->merge($products);

        if ($data) {
            return ApiResponse::sendResponse(200, 'All Businesses Card And Related Product Found', $data);
        } else {
            return ApiResponse::sendResponse(200, 'Businesses Card "Not" Found', []);
        }
    }
}
