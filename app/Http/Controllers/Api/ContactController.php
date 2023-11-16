<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function __invoke(Request $request)
    {

        $data = $request->validate([
            'full_name' => 'required',
            'phone_number' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $record = Contact::create($data);
        if ($record) {
            return ApiResponse::sendResponse(201, 'Sent Successfully', []);
        }
    }
}
