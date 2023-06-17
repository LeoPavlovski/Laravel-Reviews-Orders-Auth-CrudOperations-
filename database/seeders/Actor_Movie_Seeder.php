<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Actor_Movie_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     *  Schema::create('actor_movie', function (Blueprint $table) {
    $table->unsignedBigInteger('actor_id');
    $table->foreign('actor_id')->references('id')->on('actors');
    $table->unsignedBigInteger('movie_id');
    $table->foreign('movie_id')->references('id')->on('movies');
    });
     */

    public function run(): void
    {
        DB::table('actor_movies')->insert([
         'actor_id'=>1,
         'movie_id'=>1
        ]);
    }
}
