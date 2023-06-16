<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oscar extends Model
{
    use HasFactory;
    // $table->id();
    //            $table->string('role');
    //            $table->year('year');
    //            $table->unsignedBigInteger('actor_id');
    //            $table->foreign('actor_id')->references('id')->on('actors');
    //            $table->timestamps();

    protected $fillable =[
      'role',
      'year',
      'actor_id',
    ];

    public function actor(){
        return $this->belongsTo(Actor::class);
    }
}
