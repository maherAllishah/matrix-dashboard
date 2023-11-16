<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeatureRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'image' => 'required',
            'title' => 'required',
            'description' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'image.required' => 'Image Of Feature Is Required',
            'title.required' => 'You Should Enter A Title To This Feature',
            'description.required' => 'Please Enter The Description',
        ];
    }
}
