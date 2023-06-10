<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
          "title"=>$this->title,
          "year"=>$this->year,
          "year_of_production"=>$this->year_of_prodcution,
          "price"=>$this->price,
          "ISBN"=>$this->ISBN,
            "author_id"=>$this->author_id,
            "genre_id"=>$this->genre_id,
        ];
    }
}
