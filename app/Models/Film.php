<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//$table->id();
//            $table->string('premier_week');
//            $table->string('city');
//            $table->string('format');
//            $table->unsignedBigInteger('oscar_id');
//            $table->foreign('oscar_id')->references('id')->on('oscars');
//            $table->timestamps();
class Film extends Model
{
    use HasFactory;
    protected $fillable =[
      'premier_week',
      'city',
      'formats',
      'oscar_id',
    ];
    public function oscar(){
        return $this->belongsTo(Oscar::class);
    }
}
