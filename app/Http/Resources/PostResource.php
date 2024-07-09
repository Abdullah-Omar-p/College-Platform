<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'body' => $this->body,
            'prof_id' => $this->prof_id,
            'media' => MediaResource::collection($this->whenLoaded('media')), // Eager load media
            'created_at'=> $this->created_at,
            'updated_at'=> $this->updated_at,
        ];
    }
}
