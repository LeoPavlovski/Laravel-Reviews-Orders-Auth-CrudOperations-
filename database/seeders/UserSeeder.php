<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//         'name',
//        'email',
//        'password',
//        'role_id'

        DB::table('users')->insert(
        [    [
               'name'=>"test1",
                "email"=>"test1@gmail.com",
                "password"=>Hash::make('1234'),
                'role_id'=>1
                     ],
            [
                'name'=>"test2",
                "email"=>"test2@gmail.com",
                "password"=>Hash::make('1234'),
                'role_id'=>2
            ],
        ]
        );
    }
}
