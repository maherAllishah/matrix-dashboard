<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FeatureResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $id = $this->id % 2 == 0 ? 'even' : 'odd';
        $data = [
            'id' => $id,
            'Title' => $this->title,
            'Description' => $this->description,
            'Image' => $this->image,
        ];
        return $data;
    }
}
