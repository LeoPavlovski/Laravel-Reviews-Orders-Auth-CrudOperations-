<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;
//      $table->id();
//            $table->string('name');
//            $table->string('code');
//            $table->timestamps();
    protected $fillable= [
      'name',
      'code'
    ];
}
