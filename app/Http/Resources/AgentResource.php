<?php

namespace App\Http\Resources;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AgentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    //    use HasFactory;
    ////      $table->id();
    ////            $table->string('name');
    ////            $table->string('code');
    ////            $table->timestamps();
    ///
    public function toArray(Request $request): array
    {
        return [
            'name'=>$this->name,
            'code'=>$this->code,
        ];
    }
}
