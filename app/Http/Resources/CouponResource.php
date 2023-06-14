<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CouponResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
          "code"=>$this->code,
          "name"=>$this->name,
          "description"=>$this->description,
          "valid_from"=>$this->valid_from,
          "valid_until"=>$this->valid_until,
          "is_active"=>$this->is_active,
            //We need to take the relationship
          'books' => new BookResource($this->whenLoaded('book')),
        ];
    }
}
