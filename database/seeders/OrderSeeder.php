<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       // Db seeders
        DB::table('orders')->insert([
            [
                "subtotal"=>1,
                "tax"=>2,
                "quantity"=>1,
                "user_id"=>1,
                "book_id"=>1,
                "order_id"=>uuid_create()
            ]

        ]);
    }
}
