<?php

namespace Database\Seeders;

use App\Models\STATUS;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WishlistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('wishlists')->insert([
          [  "user_id" => 6,
            "book_id" => 9,
            "status" => STATUS::PRIVATE->value],
            [
                "user_id" => 4,
                "book_id" => 2,
                "status" => STATUS::VISIBLE->value
            ],
            [
                "user_id" => 8,
                "book_id" => 7,
                "status" => STATUS::PRIVATE->value
            ],
            [
                "user_id" => 1,
                "book_id" => 10,
                "status" => STATUS::VISIBLE->value
            ],
            [
                "user_id" => 3,
                "book_id" => 5,
                "status" => STATUS::PRIVATE->value
            ],
            [
                "user_id" => 2,
                "book_id" => 1,
                "status" => STATUS::VISIBLE->value
            ],
            [
                "user_id" => 9,
                "book_id" => 6,
                "status" => STATUS::PRIVATE->value
            ],
            [
                "user_id" => 5,
                "book_id" => 3,
                "status" => STATUS::VISIBLE->value
            ],
        ]);
    }
}
