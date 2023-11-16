<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CareerRequest extends FormRequest
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
    public function rules()
    {
        return [
            'name' => 'required|string',
            'department_id' => 'required',
            'salary' => 'required',
            'experience' => 'required',
            'work_type' => 'required',
            'skills' => 'required',
            'description' => 'required',
            'your_tasks' => 'required',
            'Work_requirements' => 'required',
            'we_offer' => 'required',
            'situation' => 'required',
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
            'message.required' => 'Please enter your name',
            'department_id.required' => 'Please select a department',
            'experience.required' => 'Please enter your experience',
            'work_type.required' => 'Please select a work type',
            'skills.required' => 'Please enter your skills',
            'description.required' => 'Please provide a job description',
            'your_tasks.required' => 'Please list your tasks',
            'Work_requirements.required' => 'Please provide work requirements',
            'we_offer.required' => 'Please describe what you offer',
            'situation.required' => 'Please select a situation',
        ];
    }
}
