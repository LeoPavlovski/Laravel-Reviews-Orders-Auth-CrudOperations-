<?php

namespace Database\Seeders;

use App\Models\RECOMMENDATIONTYPES;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecommendationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('recommendation_types')->insert([
              [
                  'type'=>RECOMMENDATIONTYPES::ACTOR->name,
                  'id'=>RECOMMENDATIONTYPES::ACTOR->value
              ],
              [
                'type'=>RECOMMENDATIONTYPES::MOVIE->name,
                'id'=>RECOMMENDATIONTYPES::MOVIE->value
              ],
        ]);
    }
}
