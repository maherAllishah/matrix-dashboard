<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SettingResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'the_country' => $this->country,
            'the_city' => $this->city,
            'the_phone' => $this->phone,
            'the_email' => $this->email,
            'hours_work' => $this->hours,
        ];
    }
}
