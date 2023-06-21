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
class ActorMovie extends Model
{
    use HasFactory;
    protected $fillable =[
      'actor_id',
      'movie_id'
    ];
    public function actors()
    {
        return $this->belongsToMany(Actor::class, 'actor_movies', 'actor_id', 'actor_id');
    }

    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'actor_movies', 'movie_id', 'movie_id');
    }
}
