<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        DB::table('users')->insert(
            [
                [
                    'email'=>'leo.te20112asopdjka@hotmaicl.cm',
                    'password'=>Hash::make('1234'),
                    'surname'=>'pavlovski',
                    'Date_of_rent'=>'2023-10-10',
                    'Date_of_return'=>'2023-11-10',
                    'number'=>"+2131234",
                    "name"=>"leo",
                ],
                [
                    'email'=>'leo.wdasd@hotmaicl.cm',
                    'password'=>Hash::make('1234'),
                    'surname'=>'pavlovski',
                    'Date_of_rent'=>'2023-10-10',
                    'Date_of_return'=>'2023-11-10',
                    'number'=>"+231241412",
                    "name"=>"leo",
                ]
            ]
        );
    }
}
