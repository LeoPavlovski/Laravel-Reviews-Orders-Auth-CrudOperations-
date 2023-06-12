<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'ISBN',
        'year_of_production',
        'price',
        'year',
        'author_id',
        'genre_id',
        'language',
        'pages',
        'cover_image',
        'edition'
    ];
    public function author ()
    {
        return $this->belongsTo(Author::class);
    }
    public function genre (){
        return $this->belongsTo(Genre::class);
    }
    protected $rules =[
        'ISBN' => 'digits:13',
    ];
}



//Foreign keys
