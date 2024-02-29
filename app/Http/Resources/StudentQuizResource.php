<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentQuizResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'quiz_id'=>$this->quiz_id,
            'student_id' => $this->student_id,
            'quiz_name' => $this->quiz_name,
            'grade' => $this->grade,
        ];
    }
}
