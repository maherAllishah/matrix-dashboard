<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $products = Product::all();

        if ($products) {
            return ApiResponse::sendResponse(200, 'All Products are Found', ProductResource::collection($products));
        } else {
            return ApiResponse::sendResponse(200, 'Products Not Found', []);
        }
    }
}
