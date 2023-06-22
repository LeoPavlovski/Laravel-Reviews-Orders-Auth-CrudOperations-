<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OscarSeeder extends Seeder
{
    //  $table->id();
    //            $table->string('role');
    //            $table->year('year');
    //            $table->unsignedBigInteger('actor_id');
    //            $table->foreign('actor_id')->references('id')->on('actors');
    //            $table->timestamps();

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('oscars')->insert([
            [
                "role"=>'Actor',
                'year'=>'2023',
                'actor_id'=>1,
            ],
            [
                "role"=>'Actor',
                'year'=>'2023',
                'actor_id'=>1,
            ],
            [
                "role"=>'Actor',
                'year'=>'2023',
                'actor_id'=>1,
            ],
            [
                "role"=>'Actor',
                'year'=>'2023',
                'actor_id'=>1,
            ],
            [
                "role"=>'Actor',
                'year'=>'2023',
                'actor_id'=>1,
            ],
            [
                "role"=>'Actor',
                'year'=>'2023',
                'actor_id'=>1,
            ],
        ]);
    }
}
