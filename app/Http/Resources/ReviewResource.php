<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "review_id"=>$this->id,
            "subject"=>$this->subject,
            "description"=>$this->description,
            "grade"=>$this->grade,
            'user' => new UserResource($this->whenLoaded('user')),
            'book'=>new BookResource($this->whenLoaded('book')),
        ];
    }
}
