<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Db seeders
        DB::table('orders')->insert([
            [
                "total"=>10.99,
                "book_id"=>1,
                "user_id"=>1,
                "id"=>uuid_create(),

            ],
            [
                "total" => 10.99,
                "book_id" => 1,
                "user_id" => 1,
                "id"=>uuid_create(),

            ],

        ]);
    }
}
