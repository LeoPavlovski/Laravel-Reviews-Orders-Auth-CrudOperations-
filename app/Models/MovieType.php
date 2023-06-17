<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//   Schema::create('movies_types', function (Blueprint $table) {
//            $table->id();
//            $table->string('types');
//            $table->timestamps();
//        });
//    }
class MovieType extends Model
{
    use HasFactory;
    protected $fillable = [
      'types'
    ];


}
