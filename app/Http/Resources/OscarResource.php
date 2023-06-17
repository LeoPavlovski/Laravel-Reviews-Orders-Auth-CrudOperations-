<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OscarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     *         // $table->id();
    //            $table->string('role');
    //            $table->year('year');
    //            $table->unsignedBigInteger('actor_id');
    //            $table->foreign('actor_id')->references('id')->on('actors');
    //            $table->timestamps();
     */
    public function toArray(Request $request): array
    {
       return [
         'role'=>$this->role,
         'year'=>$this->year,
         'actor_id'=>$this->actor_id,
       ];
    }
}
