<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// $table->id();
//            $table->string('tv_channel');
//            $table->string('episodes');
//            $table->unsignedBigInteger('actor_id');
//            $table->foreign('actor_id')->references('id')->on('actors');
//            $table->timestamps();
class TV extends Model
{
    use HasFactory;
    protected $fillable =[
      'tv_channel',
      'episodes',
      'actor_id',
    ];
    public function actor(){
        return $this->belongsTo(Actor::class);
    }
}
