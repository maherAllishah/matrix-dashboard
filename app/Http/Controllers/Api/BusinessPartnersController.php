<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Trait\UploadImageInApi;
use App\Models\BusinessPartners;
use Illuminate\Http\Request;

class BusinessPartnersController extends Controller
{
    use UploadImageInApi;

    public function __invoke(Request $request): \Illuminate\Http\JsonResponse
    {

        $request->validate([
            'province_id' => 'required|string',
            'full_name' => 'required|string',
            'full_address' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'file_cv' => 'required',
            'photo' => 'nullable',
        ]);

        $attributes = $request->except('file_cv');

        if ($request->hasFile('photo')) {
            $attributes['photo'] = $this->upload($request->file('photo'), 'business_partner_files');
        }

        $businessPartners = BusinessPartners::create(array_merge(
            $attributes,
            ['file_cv' => $this->upload($request->file('file_cv'), 'business_partner_files')]
        ));

        return ApiResponse::sendResponse(201, 'Business partners added successfully.', $businessPartners);
    }
}
