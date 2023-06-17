<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//  $table->id();
//            $table->string('first_week');
//            $table->string('city');
//            $table->string('format');
//            $table->unsignedBigInteger('premier_id');
//            $table->foreign('premier_id')->references('id')->on('premier_types');
//            $table->timestamps();
class Premier extends Model
{
    use HasFactory;

    protected $fillable =[
      'first_week',
      'city',
      'formats',
      'premier_id',
    ];
    public function premier(){
        return $this->belongsTo(PREMIERS_TYPES::class);
    }

}
