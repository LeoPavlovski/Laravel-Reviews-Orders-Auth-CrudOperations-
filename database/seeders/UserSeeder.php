<?php

namespace Database\Seeders;

use App\Models\ROLES;
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
          [  "name"=>"Leo",
            "password"=>Hash::make('1234'),
            "email"=>"leo.te2011@hotmail.com",
            "role_id"=>ROLES::ADMIN->value],
            [
                "name" => "John",
                "password" => Hash::make('1234'),
                "email" => "john@example.com",
                "role_id" => ROLES::USER->value
            ],
            [
                "name" => "Emma",
                "password" => Hash::make('1234'),
                "email" => "emma@example.com",
                "role_id" => ROLES::ADMIN->value
            ],
            [
                "name" => "Sarah",
                "password" => Hash::make('1234'),
                "email" => "sarah@example.com",
                "role_id" => ROLES::USER->value
            ],
            [
                "name" => "Michael",
                "password" => Hash::make('1234'),
                "email" => "michael@example.com",
                "role_id" => ROLES::ADMIN->value
            ],
            [
                "name" => "Emily",
                "password" => Hash::make('1234'),
                "email" => "emily@example.com",
                "role_id" => ROLES::USER->value
            ],
            [
                "name" => "Daniel",
                "password" => Hash::make('1234'),
                "email" => "daniel@example.com",
                "role_id" => ROLES::ADMIN->value
            ],
            [
                "name" => "Olivia",
                "password" => Hash::make('1234'),
                "email" => "olivia@example.com",
                "role_id" => ROLES::USER->value
            ],
            [
                "name" => "William",
                "password" => Hash::make('1234'),
                "email" => "william@example.com",
                "role_id" => ROLES::ADMIN->value
            ],

        ]);
    }
}
