<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
////   Schema::create('movies_types', function (Blueprint $table) {
////            $table->id();
////            $table->string('types');
////            $table->timestamps();
////        });
////    }
class MovieTypeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
      return [
          'id'=>$this->id,
          'types'=>$this->types
      ];
    }
}
