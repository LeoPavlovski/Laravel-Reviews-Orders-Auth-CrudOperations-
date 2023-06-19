<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $fillable = [
      //this is for the appointments
        'start_date',
        'end_date',
        'user_id'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
