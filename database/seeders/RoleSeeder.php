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
                 'role'=>ROLES::DOCTOR->name,
                 'id'=>ROLES::DOCTOR->value
             ],
                [
                    'role'=>ROLES::PATIENT->name,
                    'id'=>ROLES::PATIENT->value
                ],
        ]);
    }
}
