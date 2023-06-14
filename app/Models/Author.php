<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable= [
      "name",
      "biography",
      'book_id'
    ];
    public function book(){

        return $this->hasMany(Book::class, 'author_id');
    }
 }
