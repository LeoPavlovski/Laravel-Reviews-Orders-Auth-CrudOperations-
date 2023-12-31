<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
       return [
         "name"=>$this->name,
         "biography"=>$this->biography,
         'books' => BookResource::collection($this->whenLoaded('book'))
       ];
    }
}
