<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {

        return [

            'image' => 'required',
            'name' => 'required',
            'link' => 'required',
            'business_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'image.required' => 'Image Of Product Is Required',
            'name.required' => 'You Should Enter A Title To This Product',
            'link.required' => 'Please Enter The Description',
            'business_id.required' => 'Please Choose The Business From Selection',
        ];
    }
}
