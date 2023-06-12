<?php

namespace Database\Seeders;

use App\Models\STATUS;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('statuses')->insert([
            //2 Statuses
            [
                "status"=>STATUS::VISIBLE->name,
                "id"=>STATUS::VISIBLE->value,
            ],
            [
                "status"=>STATUS::PRIVATE->name,
                'id'=>STATUS::PRIVATE->value,
            ]
        ]);
    }
}
