<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//  Schema::create('actor_movie', function (Blueprint $table) {
//           $table->unsignedBigInteger('actor_id');
//           $table->foreign('actor_id')->references('id')->on('actors');
//            $table->unsignedBigInteger('movie_id');
//            $table->foreign('movie_id')->references('id')->on('movies');
//        });
class Actor_Movie extends Model
{
    use HasFactory;
    protected $fillable =[
      'actor_id',
      'movie_id'
    ];

    public function actors(){
        return $this->belongsToMany(Actor::class);
    }
    public function movies(){
        return $this->belongsToMany(Movie::class);
    }
}
