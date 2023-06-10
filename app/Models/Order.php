<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
      //Updating the values
        'book_id',
        'user_id',
        'total'
    ];

    public function books(){
        return $this->belongsTo(Book::class);
    }

    public function users(){
        return $this->belongsTo(Book::class);
    }
}
