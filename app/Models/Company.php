<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
//      $table->id();
//            $table->string('name');
//            $table->string('address');
//            $table->bigInteger('tax');
//            $table->timestamps();
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'tax',
    ];
}
