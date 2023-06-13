<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class bookRecommentationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('recommendations')->insert([
         'recommendation_text'=>'Some Text',
            'user_id'=>1,
            "book_id"=>5
        ]);
    }
}
