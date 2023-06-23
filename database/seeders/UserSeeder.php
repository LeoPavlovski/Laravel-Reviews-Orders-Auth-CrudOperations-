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
        DB::table('users')->insert([
            [
                'name'=>"Leo",
                'password'=>Hash::make('1234'),
                'email'=>"leo.te2011@hotmail.com",
                'role_id'=>1
            ],
            [
                'name'=>"ksdkad",
                'password'=>Hash::make('1234'),
                'email'=>"nikola@hotmail.com",
                'role_id'=>1
            ]

        ]);
    }
}
