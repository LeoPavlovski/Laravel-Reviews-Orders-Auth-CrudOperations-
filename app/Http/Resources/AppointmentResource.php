<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AppointmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     *
     *  'start_date',
    'end_date',
    'user_id',
    'doctor_id'
     */
    public function toArray(Request $request): array
    {
        return [
            'start_date'=>$this->start_date,
            'end_date'=>$this->end_date,
            'user_id'=>$this->user_id,
            'doctor_id'=>$this->doctor_id
        ];
    }
}
