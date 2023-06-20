<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     *
     *  //Columns
    $table->id();
    $table->integer('rating');
    $table->string('content');
    $table->integer('likes');
    $table->integer('dislikes');
    $table->integer('votes');
    //Foreign keys
    $table->unsignedBigInteger('reported_by');
    $table->foreign('user_id')->references('id')->on('users');
    $table->unsignedBigInteger('user_id');
    $table->foreign('user_id')->references('id')->on('users');
    $table->unsignedBigInteger('movie_id');
    $table->foreign('movie_id')->references('id')->on('movies');

    $table->timestamps();
     */
    public function run(): void
    {
        DB::table('reviews')->insert([
            [
              'rating'=>1,
              'contents'=>'some content',
              'likes'=>200,
              'dislikes'=>300,
              'votes'=>400,
              'reported_by'=>1,
              'user_id'=>1,
              'movie_id'=>1,
                'reported_status'=>1,
            ],
            [
                'rating'=>5,
                'contents'=>'new Content',
                'likes'=>2900,
                'dislikes'=>500,
                'votes'=>4100,
                'reported_by'=>1,
                'user_id'=>1,
                'movie_id'=>2,
                'reported_status'=>2
            ],
        ]);
    }
}
