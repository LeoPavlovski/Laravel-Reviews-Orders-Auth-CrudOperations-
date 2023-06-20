<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
$table->id();
$table->integer('rating');
$table->string('content');
$table->integer('likes');
$table->integer('dislikes');
$table->integer('votes');
$table->boolean('reported');
//Foreign keys
$table->unsignedBigInteger('reported_by');
$table->foreign('user_id')->references('id')->on('users');
$table->unsignedBigInteger('user_id');
$table->foreign('user_id')->references('id')->on('users');
$table->unsignedBigInteger('movie_id');
$table->foreign('movie_id')->references('id')->on('movies');
 **/
class Review extends Model
{
    use HasFactory;
    protected $fillable =[
      'rating',
      'contents',
      'likes',
      'dislikes',
      'votes',
      'reported_status',
      'reported_by',
      'user_id',
      'movie_id'
    ];
    public function reported(){
        return $this->belongsTo(User::class);
    }
    public function reported_status(){
        return $this->belongsTo(REPORTED::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function movie(){
        return $this->belongsTo(Movie::class);
    }
}
