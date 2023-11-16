<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
        $rules = [
            'title' => 'required|string',
            'description' => 'required|string',
        ];

        if ($this->route('service')) {
            $rules['image'] = 'nullable';
        } else {
            $rules['image'] = 'required';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'image.required' => 'Image Of Service Is Required',
            'title.required' => 'You Should Enter A Title To This Service',
            'description.required' => 'Please Enter The Description',
        ];
    }
}
