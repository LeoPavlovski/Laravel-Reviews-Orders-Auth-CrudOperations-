<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PremierTypeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     *      'types'
     */
    public function toArray(Request $request): array
    {
      return [
        'types'=>$this->types
      ];
    }
}
