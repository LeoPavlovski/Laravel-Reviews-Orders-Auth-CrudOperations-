<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
       return [
         'email'=>$this->email,
         'password'=>$this->password,
         'name'=>$this->name,
         'phone'=>$this->phone,
         'role_id'=>$this->role_id
       ];
    }
}
