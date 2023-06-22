<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class recommendationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *  'user_id',
    'text',
    'grade'
     */
    public function run(): void
    {
        DB::table('recommendations')->insert([
            [
               'user_id'=>1,
               'text'=>'some text',
               'grade'=>5
            ] ,
            [
                'user_id'=>1,
                'text'=>'some text',
                'grade'=>3
            ]
        ]);
    }
}
