<?php

namespace Database\Seeders;

use App\Models\MOVIES_TYPES;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MOVIES extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('movie_types')->insert([
            [
               'types'=>MOVIES_TYPES::FILM->name,
                'id'=>MOVIES_TYPES::FILM->value,
            ],
            [
                'types'=>MOVIES_TYPES::TV_SERIES->name,
                'id'=>MOVIES_TYPES::TV_SERIES->value,
            ],
        ]);
    }
}
