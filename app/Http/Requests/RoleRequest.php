<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $id = $this->route()->role->id ?? null;

        return [
            'name' => 'required|string|unique:roles,name,' . $id,
            'permissionArray' => 'required|array',
        ];
    }

    /**
     * Attributes .
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Please enter the name of role',
            'permissionArray.required' => 'Please select a role'
        ];
    }
}
