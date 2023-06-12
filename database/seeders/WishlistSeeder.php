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
         "user_id"=>1,
         "book_id"=>1,
          "status"=>STATUS::PRIVATE->value,
        ]);
    }
}
