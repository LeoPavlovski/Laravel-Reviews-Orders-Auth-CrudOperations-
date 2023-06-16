<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActorSeeder extends Seeder
{
    //  $table->id();
    //            $table->string('name');
    //            $table->string('nickname');
    //            $table->date('date_of_birth');
    //            $table->unsignedBigInteger('agent_id');
    //            $table->foreign('agent_id')->references('id')->on('agents');
    //            $table->timestamps();
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('actors')->insert([
            [
                "name"=>'leo',
                'nickname'=>'something',
                'date_of_birth'=>'2023-10-10',
                'agent_id'=>1
            ],
        ]);
    }
}
