<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CareerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        return [
            'career_id' => $this->id,
            'career_name' => $this->name,
            'department_name' => $this->department->name,
            'salary' => $this->salary,
            'experience' => $this->experience,
            'work_type' => $this->work_type,
            'skills' => $this->skills,
            'your_tasks' => $this->your_tasks,
            'Work_requirements' => $this->Work_requirements,
            'we_offer' => $this->we_offer,
            'description' => $this->description,
            'situation_Visible' => $this->situation,
            'created_at' => $this->created_at->format('Y-m-d'),
            'updated_at' => $this->updated_at->format('Y-m-d'),
        ];

    }
}
