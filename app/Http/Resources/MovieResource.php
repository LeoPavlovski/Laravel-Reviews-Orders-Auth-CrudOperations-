<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
////  $table->id();
////            $table->string('name');
////            $table->unsignedBigInteger('director_id');
////            $table->foreign('director_id')->references('id')->on('directors');
////            $table->float('salary');
///
class MovieResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
       return [
         'name'=>$this->name,
         'director_id'=>$this->director_id,
         'salary'=>$this->salary,
           'director' => new DirectorResource($this->whenLoaded('director'))
       ];
    }
}
