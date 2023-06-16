<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//  $table->id();
//            $table->string('name');
//            $table->unsignedBigInteger('director_id');
//            $table->foreign('director_id')->references('id')->on('directors');
//            $table->float('salary');
class Movie extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'director_id',
        'salary'
    ];
    public function director(){
        return $this->belongsTo(Director::class);
    }
}
