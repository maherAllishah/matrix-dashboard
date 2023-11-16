<?php

namespace App\Http\Resources;

use App\Models\BusinessPartners;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SettingsBusinessPartnerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $number_of_partner = BusinessPartners::where('status', 'approved')->count();
        return [
            "brief" => $this->brief,
            "first_photo_in_title" => $this->first_photo_in_title,
            "second_photo_in_title" => $this->second_photo_in_title,
            "first_icon_features" => $this->first_icon_features,
            "first_title_features" => $this->first_title_features,
            "second_icon_features" => $this->second_icon_features,
            "second_title_features" => $this->second_title_features,
            "third_icon_features" => $this->third_icon_features,
            "third_title_features" => $this->third_title_features,
            "fourth_icon_features" => $this->fourth_icon_features,
            "fourth_title_features" => $this->fourth_title_features,
            "first_video" => $this->first_video,
            "first_image_video" => $this->first_image_video,
            "first_title_video" => $this->first_title_video,
            "second_video" => $this->second_video,
            "second_image_video" => $this->second_image_video,
            "second_title_video" => $this->second_title_video,
            "third_video" => $this->third_video,
            "third_image_video" => $this->third_image_video,
            "third_title_video" => $this->third_title_video,
            "privacy_policy" => $this->privacy_policy,
            "successful_deals" => $this->successful_deals,
            "Paid_ratios" => $this->Paid_ratios,
            "number_of_partner" => $number_of_partner

        ];
    }
}
