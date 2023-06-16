<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// $table->id();
//            $table->string('name');
//            $table->string('nickname');
//            $table->date('date_of_birth');
//            $table->unsignedBigInteger('agent_id');
//            $table->foreign('agent_id')->references('id')->on('agents');
//            $table->timestamps();
class Actor extends Model
{
    use HasFactory;

    protected $fillable =[
      'name',
      'nickname',
      'date_of_birth',
      'agent_id',
    ];
    public function agent(){
        return $this->belongsTo(Agent::class);
    }

}
