<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentDataResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'user_id'=>$this->user_id,
            'national_id' => $this->national_id,
            'phone' => $this->phone,
            'address' => $this->address,
            'family_phone' => $this->family_phone,
            'email' => $this->email,
        ];
    }
}
