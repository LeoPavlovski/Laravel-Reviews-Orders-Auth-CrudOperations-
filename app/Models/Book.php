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
        'edition',
        'status'

    ];
    public function author ()
    {
        return $this->belongsTo(Author::class);
    }
    public function genre(){
        return $this->belongsTo(Genre::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function coupon()
    {
        return $this->hasMany(Coupon::class);
    }
    public function wishlist(){
        return $this->hasMany(Wishlist::class);
    }
    public function order(){
        return $this->hasMany(Order::class);
    }
    protected $rules =[
        'ISBN' => 'digits:13',
    ];
}
//Foreign keys
