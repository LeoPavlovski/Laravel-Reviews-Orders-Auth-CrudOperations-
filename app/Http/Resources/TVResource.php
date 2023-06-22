<?php

namespace App\Http\Resources;

use App\Models\Actor;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TVResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     *     // $table->id();
    //            $table->string('tv_channel');
    //            $table->string('episodes');
    //            $table->unsignedBigInteger('actor_id');
    //            $table->foreign('actor_id')->references('id')->on('actors');
    //            $table->timestamps();
     */
    public function toArray(Request $request): array
    {
        return [
          'tv_channel'=>$this->tv_channel,
          'episodes'=>$this->episodes,
          'actor_id'=>$this->actor_id,
          'actor'=>new ActorResource($this->whenLoaded('actor')),
        ];
    }
}
