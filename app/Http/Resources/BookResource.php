<?php

namespace App\Http\Resources;

use App\Models\Wishlist;
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
            'review' => ReviewResource::collection($this->whenLoaded('reviews')),
            'author'=>new AuthorResource($this->whenLoaded('author')),
            'genre'=>new GenreResource($this->whenLoaded('genre')),
            'coupons'=>CouponResource::collection($this->whenLoaded('coupons')),
            'wishlists'=> WishtlistResource::collection($this->whenLoaded('wishlists')),
            'orders'=> OrderResource::collection($this->whenLoaded('orders')),

            "title"=>$this->title,
            "year"=>$this->year,
            "year_of_production"=>$this->year_of_production,
            "price"=>$this->price,
            "ISBN"=>$this->ISBN,
            "language"=>$this->language,
            "edition"=>$this->edition,
            "pages"=>$this->pages,
            "cover_image"=>$this->cover_image,
        ];
    }
}
