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
          "user_id"=>$this->user->id,
          "book_id"=>$this->book->id,
          "price"=>$this->book->price,
          "title"=>$this->book->title,
            "subject"=>$this->subject,
            "description"=>$this->description,
            "grade"=>$this->grade,
          "year_of_production"=>$this->book->year_of_production,
            "ISBN"=>$this->book->ISBN,
            "year"=>$this->book->year,
            "author_id"=>$this->book->author_id,
            "genre_id"=>$this->book->genre_id,
            "user_email"=>$this->user->email,
            "user_name"=>$this->user->name,

        ];
    }
}
