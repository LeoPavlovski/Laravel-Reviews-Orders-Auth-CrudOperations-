<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FilmResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    //$table->id();
//            $table->string('premier_week');
//            $table->string('city');
//            $table->string('format');
//            $table->unsignedBigInteger('oscar_id');
//            $table->foreign('oscar_id')->references('id')->on('oscars');
//            $table->timestamps();

    public function toArray(Request $request): array
    {
        return [
           'premier_week'=>$this->premier_week,
            'city'=>$this->city,
            'formats'=>$this->formats,
            'oscar_id'=>$this->oscar_id,
            'oscar'=> new OscarResource($this->whenLoaded('oscar'))
        ];
    }
}
