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
          "order_id" => Str::uuid()->toString(),
          "user_id"=>$this->user_id,
          "book_id"=>$this->book_id,
          "total"=>$this->total,
        ];
    }
}
