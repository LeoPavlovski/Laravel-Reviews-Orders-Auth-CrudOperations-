<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //    'title',
        //        'desc',
        //        'text',
        //        'url',
        DB::table('blogs')->insert([
            'title'=>'test1',
            'desc'=>'test1',
            'text'=>'sdjaskda',
            'url'=>'sajdsak'
        ]);
    }
}
