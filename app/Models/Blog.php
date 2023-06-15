<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable =[
      //variables
        'title',
        'desc',
        'text',
        'url',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
