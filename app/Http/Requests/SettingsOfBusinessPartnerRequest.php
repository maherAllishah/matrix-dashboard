<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingsOfBusinessPartnerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }


    public function rules()
    {

        $rules = [
            'brief' => 'required|string',
            'first_title_features' => 'required',
            'second_title_features' => 'required',
            'third_title_features' => 'required',
            'fourth_title_features' => 'required',
            'first_title_video' => 'required',
            'second_title_video' => 'required',
            'third_title_video' => 'nullable',
            'privacy_policy' => 'required',
            'successful_deals' => 'required',
            'Paid_ratios' => 'required',
        ];

        if ($this->route('business_partners_setting')) {
            $rules['first_photo_in_title'] = 'nullable';
            $rules['second_photo_in_title'] = 'nullable';
            $rules['first_icon_features'] = 'nullable';
            $rules['second_icon_features'] = 'nullable';
            $rules['third_icon_features'] = 'nullable';
            $rules['fourth_icon_features'] = 'nullable';
            $rules['first_video'] = 'nullable';
            $rules['first_image_video'] = 'nullable';
            $rules['second_video'] = 'nullable';
            $rules['second_image_video'] = 'nullable';
            $rules['third_video'] = 'nullable';
            $rules['third_image_video'] = 'nullable';
        } else {
            $rules['first_photo_in_title'] = 'required';
            $rules['second_photo_in_title'] = 'required';
            $rules['first_icon_features'] = 'required';
            $rules['second_icon_features'] = 'required';
            $rules['third_icon_features'] = 'required';
            $rules['fourth_icon_features'] = 'required';
            $rules['first_video'] = 'required';
            $rules['first_image_video'] = 'required';
            $rules['second_video'] = 'required';
            $rules['second_image_video'] = 'required';
            $rules['third_video'] = 'required';
            $rules['third_image_video'] = 'required';

        }


        return $rules;

    }


    public function messages()
    {
        return [
            'brief.required' => 'The Brief field is required.',
            'first_title_features.required' => 'The First Title Features field is required.',
            'second_title_features.required' => 'The Second Title Features field is required.',
            'third_title_features.required' => 'The Third Title Features field is required.',
            'fourth_title_features.required' => 'The Fourth Title Features field is required.',
            'first_title_video.required' => 'The First Title Video field is required.',
            'second_title_video.required' => 'The Second Title Video field is required.',
            'privacy_policy.required' => 'The Privacy Policy field must be required.',
            'successful_deals.required' => 'The Successful Deals field must be required.',
            'Paid_ratios.required' => 'The Paid Ratios field must be required.',
            'first_photo_in_title.required' => 'The First Photo in Title field must be required.',
            'second_photo_in_title.required' => 'The Second Photo in Title field must be required.',
            'first_icon_features.required' => 'The First Icon Features field must be required.',
            'second_icon_features.required' => 'The Second Icon Features field must be required.',
            'third_icon_features.required' => 'The Third Icon Features field must be required.',
            'fourth_icon_features.required' => 'The Fourth Icon Features field must be required.',
            'first_video.required' => 'The First Video field must be required.',
            'first_image_video.required' => 'The First Image Video field must be required.',
            'second_video.required' => 'The Second Video field must be required.',
            'second_image_video.required' => 'The Second Image Video field must be required.',

        ];

    }
}
