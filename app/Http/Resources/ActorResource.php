<?php

namespace App\Http\Resources;

use App\Models\Agent;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
//// $table->id();
////            $table->string('name');
////            $table->string('nickname');
////            $table->date('date_of_birth');
////            $table->unsignedBigInteger('agent_id');
////            $table->foreign('agent_id')->references('id')->on('agents');
////            $table->timestamps();
class ActorResource extends JsonResource
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
           'nickname'=>$this->nickname,
           'date'=>$this->date,
           'agent_id'=>$this->agent_id,

           'agent' => new AgentResource($this->whenLoaded('agent')),
       ];
    }
}
