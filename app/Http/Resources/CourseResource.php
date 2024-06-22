<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        // TODO : make resources for all models , start from here -> DONE ##
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'level' => $this->level,
            'semester' => $this->semester,
            'units' => $this->units,
            'created_at'=> $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
