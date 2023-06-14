<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RolesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "role"=>$this->role,
            "id"=>$this->id,
//            Connect the user
            "user"=>new UserResource($this->whenLoaded('user'))
        ];
    }
}
