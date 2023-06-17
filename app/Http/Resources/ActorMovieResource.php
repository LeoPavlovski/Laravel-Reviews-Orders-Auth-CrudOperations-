<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

//Schema::create('actor_movie', function (Blueprint $table) {
////           $table->unsignedBigInteger('actor_id');
////           $table->foreign('actor_id')->references('id')->on('actors');
////            $table->unsignedBigInteger('movie_id');
////            $table->foreign('movie_id')->references('id')->on('movies');
////        });
///
class ActorMovieResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            //Relationships
            'actor_id'=>$this->actor_id,
            'movie_id'=>$this->movie_id,
        ];
    }
}
