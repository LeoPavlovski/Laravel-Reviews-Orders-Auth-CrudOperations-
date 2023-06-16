<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    use HasFactory;
//      $table->id();
//            $table->string('name');
//            $table->string('surname');
//            $table->string('expertise');
//            $table->string('genre');
protected $fillable= [
    'name',
    'surname',
    'expertise',
    'genre'
];

}
