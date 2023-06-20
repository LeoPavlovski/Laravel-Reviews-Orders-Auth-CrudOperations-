<?php

namespace Database\Seeders;

use App\Models\REPORTED;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class REPORTEDSEEDER extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('reports')->insert([
            [
                'reported_status'=>REPORTED::YES->name,
                'id'=>REPORTED::YES->value
            ],
            [
                'reported_status'=>REPORTED::NO->name,
                'id'=>REPORTED::NO->value
            ]
        ]);
    }
}
