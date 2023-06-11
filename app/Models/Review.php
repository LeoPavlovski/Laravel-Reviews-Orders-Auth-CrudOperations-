<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
      "user_id",
      "book_id",
      "name",
        "subject",
        "description",
        "grade",

    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function book (){
        return $this->belongsTo(Book::class);
    }
}
