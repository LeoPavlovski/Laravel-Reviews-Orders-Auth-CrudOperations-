<?php

namespace Database\Seeders;

use App\Models\ROLES;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            [
                "role"=>ROLES::ADMIN->name,
                "id"=>ROLES::ADMIN->value
            ],
            [
                "role"=>ROLES::USER->name,
                "id"=>ROLES::USER->value
            ],
            [
                "role"=>ROLES::MODERATOR->name,
                "id"=>ROLES::MODERATOR->value
            ]
        ]);
    }
}
