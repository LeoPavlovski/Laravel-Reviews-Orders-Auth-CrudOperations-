<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $fillable= [
      'book_id',
      'code',
      'name',
      'valid_from',
      'valid_until',
      'description',
       'is_active',

    ];
    public function books(){
        return $this->belongsTo(Book::class);
    }

}
