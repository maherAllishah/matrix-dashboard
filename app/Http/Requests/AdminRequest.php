<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return
            [
                'name' => 'required|string',
//                'email' => 'required|email|unique:admins,email',
                'email' => 'required',
                'password' => 'required|min:5',
                'position' => 'required',
                'role' => 'required|not_in:1',
            ];

    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'The name is required',
            'username.required' => 'The username is required',
            'email.required' => 'An email is required',
            'password' => 'Password invalid',
            'role.required' => 'The role is required',
            'role.not_in' => 'The role is required',];
    }
}
