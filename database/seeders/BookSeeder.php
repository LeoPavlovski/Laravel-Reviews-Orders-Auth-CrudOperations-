<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('books')->insert([
            "title"=>"Harry Potter",
            "year"=>2023,
            'price'=>20.33,
            'year_of_production'=>2001,
            'ISBN'=>998811,
            'author_id'=>1,
            'genre_id'=>1
        ]);
    }
}
