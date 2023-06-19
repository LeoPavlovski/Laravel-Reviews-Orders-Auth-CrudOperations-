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
                'phone'=>'1234',
                'email'=>'leo@gmail.com',
                'role_id'=>1,
            ],
            [
                'name'=>"Martin",
                'password'=>Hash::make('1234'),
                'phone'=>'1234',
                'email'=>'Martin@gmail.com',
                'role_id'=>2,
            ],
            [
                'name'=>"Nikola",
                'password'=>Hash::make('1234'),
                'phone'=>'1234',
                'email'=>'Nikola@gmail.com',
                'role_id'=>2,
            ]
        ]);
    }
}
