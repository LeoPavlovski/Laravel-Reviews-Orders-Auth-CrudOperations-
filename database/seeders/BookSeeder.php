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
            [
            "title"=>"Harry Potter",
            "year"=>2023,
            'price'=>20.33,
            'year_of_production'=>2001,
            'ISBN'=>998811,
            'author_id'=>1,
            'genre_id'=>1,
                'language'=>'english',
                'edition'=>'first',
                'pages'=>100,
                'cover_image'=>"test1",
            ],
            [
                "title" => "The Wizard's Quest",
                "year" => 2022,
                "price" => 19.99,
                "year_of_production" => 2002,
                "ISBN" => 112233,
                "author_id" => 1,
                "genre_id" => 1,
                'language'=>'english',
                'edition'=>'first',
                'pages'=>100,
                'cover_image'=>"test1"
            ],
            [
                "title" => "The Enchanted Chronicles",
                "year" => 2023,
                "price" => 21.99,
                "year_of_production" => 2003,
                "ISBN" => 445566,
                "author_id" => 1,
                "genre_id" => 1,
                'language'=>'english',
                'edition'=>'first',
                'pages'=>100,
                'cover_image'=>"test1"
            ],
            [
                "title" => "Spellbound Secrets",
                "year" => 2021,
                "price" => 18.99,
                "year_of_production" => 2000,
                "ISBN" => 778899,
                "author_id" => 1,
                "genre_id" => 1,
                'language'=>'english',
                'edition'=>'first',
                'pages'=>100,
                'cover_image'=>"test1"
            ],   [
                "title" => "Magical Journeys",
                "year" => 2024,
                "price" => 22.99,
                "year_of_production" => 2005,
                "ISBN" => 990011,
                "author_id" => 1,
                "genre_id" => 1,
                'language'=>'english',
                'edition'=>'first',
                'pages'=>100,
                'cover_image'=>"test1"
            ],   [
                "title" => "The Sorcerer's Legacy",
                "year" => 2023,
                "price" => 17.99,
                "year_of_production" => 2004,
                "ISBN" => 123456,
                "author_id" => 1,
                "genre_id" => 1,
                'language'=>'english',
                'edition'=>'first',
                'pages'=>100,
                'cover_image'=>"test1"
            ],
            [
                "title" => "Enigma of the Arcane",
                "year" => 2022,
                "price" => 20.99,
                "year_of_production" => 2001,
                "ISBN" => 654321,
                "author_id" => 1,
                "genre_id" => 1,
                'language'=>'english',
                'edition'=>'first',
                'pages'=>100,
                'cover_image'=>"test1"
            ],
            [
                "title" => "Realm of Shadows",
                "year" => 2024,
                "price" => 18.49,
                "year_of_production" => 2003,
                "ISBN" => 987654,
                "author_id" => 1,
                "genre_id" => 1,
                'language'=>'english',
                'edition'=>'first',
                'pages'=>100,
                'cover_image'=>"test1"
            ],
            [

                "title" => "Mystic Spells and Potions",
                "year" => 2021,
                "price" => 16.99,
                "year_of_production" => 1999,
                "ISBN" => 246810,
                "author_id" => 1,
                "genre_id" => 1,
                'language'=>'english',
                'edition'=>'first',
                'pages'=>100,
                'cover_image'=>"test1"
            ],
            [
                "title" => "The Enchanted Garden",
                "year" => 2025,
                "price" => 24.99,
                "year_of_production" => 2006,
                "ISBN" => 135790,
                "author_id" => 1,
                "genre_id" => 1,
                'language'=>'english',
                'edition'=>'first',
                'pages'=>100,
                'cover_image'=>"test1"
            ],
            [
                "title" => "Wizards and Wonders",
                "year" => 2023,
                "price" => 23.99,
                "year_of_production" => 2002,
                "ISBN" => 246813,
                "author_id" => 1,
                "genre_id" => 1,
                'language'=>'english',
                'edition'=>'first',
                'pages'=>100,
                'cover_image'=>"test1"
            ],


        ]);
    }
}
