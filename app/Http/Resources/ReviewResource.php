<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *    *  'rating',
    'contents',
    'likes',
    'dislikes',
    'votes',
    'reported_status',
    'reported_id',
    'user_id',
    'movie_id'
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
       return [
           'rating'=>$this->rating,
           'contents'=>$this->contents,
           'likes'=>$this->likes,
           'dislikes'=>$this->dislikes,
           'votes'=>$this->votes,
           'reported_status'=>$this->reported_status,
           'reported_by'=>$this->reported_by,
           'user_id'=>$this->user_id,
           'movie_id'=>$this->movie_id
       ];
    }
}
