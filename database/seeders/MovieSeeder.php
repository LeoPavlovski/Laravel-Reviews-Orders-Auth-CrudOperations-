<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    //  $table->id();
    //            $table->string('name');
    //            $table->unsignedBigInteger('director_id');
    //            $table->foreign('director_id')->references('id')->on('directors');
    //            $table->float('salary');
    //            $table->timestamps();
    public function run(): void
    {
        DB::table('movies')->insert([
            [
                "name"=>'leo',
                'director_id'=>1,
                'salary'=>123123,
            ],
            [
                "name"=>'dasd',
                'director_id'=>1,
                'salary'=>12321,
            ],
        ]);
    }
}
