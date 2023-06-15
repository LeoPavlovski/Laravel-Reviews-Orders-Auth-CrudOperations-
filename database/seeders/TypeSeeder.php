<?php

namespace Database\Seeders;

use App\Models\TYPES;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('types')->insert([
            [
                "type"=>TYPES::CARS->name,
                "id"=>TYPES::CARS->value,
                'brand_id'=>1,
            ],
            [
                "type"=>TYPES::MOTORS->name,
                "id"=>TYPES::MOTORS->value,
                'brand_id'=>2,

            ],
            [
                "type"=>TYPES::TRUCKS->name,
                "id"=>TYPES::TRUCKS->value,
                'brand_id'=>3,
            ],
        ]);
    }
}
