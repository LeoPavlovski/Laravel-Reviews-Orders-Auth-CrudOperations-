<?php

namespace Database\Seeders;

use App\Models\ROLES;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ROLE extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            [
              'role'=>ROLES::Admin->name,
              'id'=>ROLES::Admin->value
            ],
            [
                'role'=>ROLES::User->name,
                'id'=>ROLES::User->value
            ],
            [
                'role'=>ROLES::Moderator->name,
                'id'=>ROLES::Moderator->value
            ],

        ]);
    }
}
