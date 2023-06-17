<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Actor;
use App\Models\Agent;
use App\Models\Oscar;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
           AgentSeeder::class,
            DirectorSeeder::class,
            ActorSeeder::class,
            OscarSeeder::class,
            MOVIES::class,
            PREMIERS::class,
            MovieSeeder::class,
            PremierSeeder::class,
            Actor_Movie_Seeder::class,
            TVSeeder::class,
            FilmSeeder::class,
            Actor_Movie_Seeder::class,
        ]);
    }
}
