<?php

namespace App\Http\Resources;


use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
          "order_id"=>$this->order_id,
          "quantity"=>$this->quantity,
          "subtotal"=>$this->subtotal,
          "tax"=>$this->tax,
          "book_id"=>$this->book->id,
          "user_id"=>$this->user->id,
          "title"=>$this->book->title,
          "price"=>$this->book->price,
          "user_email"=>$this->user->email,
          "user_name"=>$this->user->name,
            "authors_name"=>$this->book->author->name
        ];
    }
}
