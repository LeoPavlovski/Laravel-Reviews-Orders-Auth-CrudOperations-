<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RecommendationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            //Return the book resource
            'books' => new BookResource($this->whenLoaded('book')),
            'users'=> new UserResource($this->whenLoaded('user')),

            "recommendation_text"=>$this->recommendation_text,
            "updated_at"=>$this->updated_at,
            "created_at"=>$this->created_at,
//Users
//            "user_id"=>$this->user->id,
//            "user_name"=>$this->user->name,
//            "user_email"=>$this->user->email,
//Books
//            "book_id"=>$this->book_id,
//            "book_language"=>$this->book->language,
//            "book_pages"=>$this->book->pages,
//            "book_edition"=>$this->book->edition,
//            "book_cover_image"=>$this->book->cover_image,
//            "book_title"=>$this->book->title,
//            "book_isbn"=>$this->book->ISBN,
//            "year_of_production"=>$this->book->year_of_production,
//            "price"=>$this->book->price,
//            "year"=>$this->book->year,
//Authors
//            "author_name"=>$this->book->author->author_name,
//            "author_biography"=>$this->book->author->biography,
//Genre
//            "genre"=>$this->book->genre->name,
//Reviews
//            "review_subject" => $this->book->reviews->isNotEmpty() ? $this->book->reviews->first()->subject : null,
//            "review_description" => $this->book->reviews->isNotEmpty() ? $this->book->reviews->first()->description : null,
//            "review_grade" => $this->book->reviews->isNotEmpty() ? $this->book->reviews->first()->grade : null,
//
////Coupon
//            "coupon_code"=>$this->book->coupon->isNotEmpty() ? $this->book->coupon->first()->code:null,
//            "coupon_name"=>$this->book->coupon->isNotEmpty() ? $this->book->coupon->first()->name:null,
//            "coupon_description"=>$this->book->coupon->isNotEmpty()? $this->book->coupon->first()->description:null,
//            "coupon_valid_from"=>$this->book->coupon->isNotEmpty() ? $this->book->coupon->first()->valid_from:null,
//            "coupon_valid_until"=>$this->book->coupon->isNotEmpty() ? $this->book->coupon->first()->valid_until:null,
//
//
//// Wishlists
//
//            "wishlists_status"=>$this->book->wishlist->isNotEmpty()? $this->book->wishlist->first()->status:null,
////Recommendation

////Orders
//            "order_quantity"=>$this->book->order->isNotEmpty()? $this->book->order->first()->quantity:null,
//            "order_subtotal"=>$this->book->order->isNotEmpty()? $this->book->order->first()->subtotal:null,
//           "order_tax"=>$this->book->order->isNotEmpty()? $this->book->order->first()->tax:null,
        ];
    }
}
