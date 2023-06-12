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
            ],
            [
                "subtotal" => 1,
                "tax" => 2,
                "quantity" => 1,
                "user_id" => 3,
                "book_id" => 2,
                "order_id" => uuid_create()
            ],
            [
                "subtotal" => 1,
                "tax" => 2,
                "quantity" => 1,
                "user_id" => 6,
                "book_id" => 5,
                "order_id" => uuid_create()
            ],
            [
                "subtotal" => 1,
                "tax" => 2,
                "quantity" => 1,
                "user_id" => 4,
                "book_id" => 8,
                "order_id" => uuid_create()
            ],
            [
                "subtotal" => 1,
                "tax" => 2,
                "quantity" => 1,
                "user_id" => 2,
                "book_id" => 10,
                "order_id" => uuid_create()
            ],
            [
                "subtotal" => 1,
                "tax" => 2,
                "quantity" => 1,
                "user_id" => 9,
                "book_id" => 3,
                "order_id" => uuid_create()
            ],
            [

                "subtotal" => 1,
                "tax" => 2,
                "quantity" => 1,
                "user_id" => 5,
                "book_id" => 6,
                "order_id" => uuid_create()
            ],
            [
                "subtotal" => 1,
                "tax" => 2,
                "quantity" => 1,
                "user_id" => 7,
                "book_id" => 1,
                "order_id" => uuid_create()
            ],
            [
                "subtotal" => 1,
                "tax" => 2,
                "quantity" => 1,
                "user_id" => 8,
                "book_id" => 9,
                "order_id" => uuid_create()
            ],

        ]);
    }
}
