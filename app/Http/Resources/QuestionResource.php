<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'=> $this->id,
            'choice_1' => $this->choice_1,
            'choice_2' => $this->choice_2,
            'choice_3' => $this->choice_3,
            'choice_4' => $this->choice_4,
            'right_answer' => $this->right_answer,
            'quiz_id' => $this->quiz_id,
            'user_id' => $this->user_id,
            'created_at'=> $this->created_at,
            'updated_at'=> $this->updated_at,
        ];
    }
}
