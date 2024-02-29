<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        // TODO : make resources for all models , start from here -> DONE ##
        return [
            'id' => $this->id,
            'body' => $this->body,
            'parent_id' => $this-> parent_id,
            'user_id' => $this->user_id,
            'post_id' => $this->post_id,
        ];
    }
}
