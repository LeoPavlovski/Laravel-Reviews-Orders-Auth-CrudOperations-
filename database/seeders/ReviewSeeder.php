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
          "subject"=>"Test Review 1",
          "description"=>"Test Description 1",
// We would need to make the max here to 5 ( in the controller to get the response)
          "grade"=>5,
          "user_id"=>1,
          "book_id"=>1,
        ]);
    }
}
