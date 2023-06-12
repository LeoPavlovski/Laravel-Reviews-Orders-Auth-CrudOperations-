<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
      //Updating the values we want to get all of the elements in the book, for example title etc.
      //we want the user id , to check who got the order.
        'book_id', 
        'user_id',
        'order_id',
        'quantity',
        'subtotal',
        'tax',
    ];

    public function book(){
        return $this->belongsTo(Book::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
