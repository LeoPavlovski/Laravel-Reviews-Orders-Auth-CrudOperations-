<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
      $this->call([
         //seeders
          RolesSeeder::class,
          BlogSeeder::class,
          Userseeder::class,
          User_Blog_Seeder::class,
      ]);
    }
}
