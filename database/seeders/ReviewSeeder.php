<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('reviews')->insert([
          [  "subject" => "Test Review 1",
            "description" => "Test Description 1",
            "grade" => 5,
            "user_id" => 1,
            "book_id" => 3],
            [
                "subject" => "Test Review 2",
                "description" => "Test Description 2",
                "grade" => 4,
                "user_id" => 1,
                "book_id" => 5
            ],

            [
                "subject" => "Test Review 3",
                "description" => "Test Description 3",
                "grade" => 3,
                "user_id" => 1,
                "book_id" => 1
            ],

            [
                "subject" => "Test Review 4",
                "description" => "Test Description 4",
                "grade" => 5,
                "user_id" => 1,
                "book_id" => 2
            ],

            [
                "subject" => "Test Review 5",
                "description" => "Test Description 5",
                "grade" => 2,
                "user_id" => 1,
                "book_id" => 11
            ],

            [
                "subject" => "Test Review 6",
                "description" => "Test Description 6",
                "grade" => 4,
                "user_id" => 1,
                "book_id" => 9
            ],

            [
                "subject" => "Test Review 7",
                "description" => "Test Description 7",
                "grade" => 3,
                "user_id" => 1,
                "book_id" => 7
            ],
            [
                "subject" => "Test Review 8",
                "description" => "Test Description 8",
                "grade" => 5,
                "user_id" => 1,
                "book_id" => 8
            ],

        ]);
    }
}
