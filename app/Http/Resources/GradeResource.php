<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GradeResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'student_id' => $this->student_id,
            'course_id' => $this->course_id,
            'grade' => $this->grade,
            'course_name' => $this->course_name,
            'level' => $this->level,
            'semester' => $this->semester,
        ];
    }
}
