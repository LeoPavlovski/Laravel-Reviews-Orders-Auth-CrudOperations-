<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recommendation extends Model
{
    use HasFactory;

    //    $table->id();
    //            $table->unsignedBigInteger('user_id');
    //            $table->foreign('user_id')->references('id')->on('users');
    //            $table->string('text');
    //            $table->integer('grade');
    //            $table->timestamps();

    protected $fillable =[
      'user_id',
      'text',
      'grade',
      'type'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function type(){
        return $this->belongsTo(RecommendationType::class);
    }
}
