<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DirectorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    ////      $table->id();
    ////            $table->string('name');
    ////            $table->string('surname');
    ////            $table->string('expertise');
    ////            $table->string('genre');
    ///
    public function toArray(Request $request): array
    {
       return [
         'name'=>$this->name,
         'surname'=>$this->surname,
         'expertise'=>$this->expertise,
         'genre'=>$this->genre,
       ];
    }
}
