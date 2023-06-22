<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PremierResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     *     //  $table->id();
    //            $table->string('first_week');
    //            $table->string('city');
    //            $table->string('format');
    //            $table->unsignedBigInteger('premier_id');
    //            $table->foreign('premier_id')->references('id')->on('premier_types');
    //            $table->timestamps();
     */
    public function toArray(Request $request): array
    {
       return [
         'first_week'=>$this->first_week,
         'city'=>$this->city,
         'formats'=>$this->formats,
         'premier_id'=>$this->premier_id,
           //TODO FIX THE PREMIER_TYPES ENUM
         'premier'=>new PremierResource($this->whenLoaded('premier'))
       ];
    }
}
