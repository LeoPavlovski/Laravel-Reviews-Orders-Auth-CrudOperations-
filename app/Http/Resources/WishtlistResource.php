<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WishtlistResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
          //POSTMAN
            'wishlist_id'=>$this->id,
            'status'=>$this->status,
            'user_id'=>$this->user->id,
            'book_id'=>$this->book_id,
            'price'=>$this->book->price,
            'title'=>$this->book->title,
            'author_id'=>$this->book->author->name,
            'genre_id'=>$this->book->genre->id,
        ];
    }
}
