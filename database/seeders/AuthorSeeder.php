<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('authors')->insert([
           [ "name" => "JK Rowling",
            "biography" => "J.K. Rowling's Biography",
           ],
            [
                "name" => "Stephen King",
                "biography" => "Stephen King's Biography",

            ],
            [
                "name" => "Agatha Christie",
                "biography" => "Agatha Christie's Biography",

            ],
            [
                "name" => "Harper Lee",
                "biography" => "Harper Lee's Biography",

            ],
            [
                "name" => "George Orwell",
                "biography" => "George Orwell's Biography",

            ],
            [
                "name" => "Jane Austen",
                "biography" => "Jane Austen's Biography",

            ],
            [
                "name" => "Ernest Hemingway",
                "biography" => "Ernest Hemingway's Biography",

            ],
            [
                "name" => "F. Scott Fitzgerald",
                "biography" => "F. Scott Fitzgerald's Biography",

            ],
            [
                "name" => "Toni Morrison",
                "biography" => "Toni Morrison's Biography",

            ],

        ]);
    }
}
