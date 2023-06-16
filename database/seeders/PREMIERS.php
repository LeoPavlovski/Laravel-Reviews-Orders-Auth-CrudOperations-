<?php

namespace Database\Seeders;

use App\Models\PREMIERS_TYPES;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PREMIERS extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('premier_types')->insert([
            [
                'types'=>PREMIERS_TYPES::TwoD->name,
                'id'=>PREMIERS_TYPES::TwoD->value,
            ],
            [
                'types'=>PREMIERS_TYPES::ThreeD->name,
                'id'=>PREMIERS_TYPES::ThreeD->value,
            ],
        ]);
    }
}
