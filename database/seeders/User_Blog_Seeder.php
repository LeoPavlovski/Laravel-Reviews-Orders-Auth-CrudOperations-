<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class User_Blog_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('blog_users')->insert([
           ['user_id'=>1,
           'blog_id'=>1,],
            [
                'user_id'=>1,
                'blog_id'=>1,
            ]
        ]);
    }
}
