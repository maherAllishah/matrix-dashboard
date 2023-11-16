<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Helpers\ApiResponse;

use App\Http\Resources\ProductDetailResource;
use App\Models\Product;


class ProductDetailsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request , $business_id)
    {
        $products = Product::query()
        ->where('business_id', $business_id)
        ->get();

        if (count($products) > 0) {
            return ApiResponse::sendResponse(200, 'All Products are Found', ProductDetailResource::collection($products));
        } else {
            return ApiResponse::sendResponse(200, 'Products Not Found', []);
        }
    }
}
