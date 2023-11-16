<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingsRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'country' => 'required',
            'city' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'hours' => 'required',
        ];

    }

    public function messages()
    {
        return [
            'country.required' => 'The name is required',
            'city.required' => 'The city is required',
            'email.required' => 'The email is required',
            'hours.required' => 'The hours is required',
            'phone.required' => 'The phone is required',
        ];
    }
}
