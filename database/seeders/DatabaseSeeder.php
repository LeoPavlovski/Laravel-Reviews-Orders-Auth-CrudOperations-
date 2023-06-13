<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Review;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AuthorSeeder::class,
            GenreSeeder::class,
            BookSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            OrderSeeder::class,
            ReviewSeeder::class,
            StatusSeeder::class,
            WishlistSeeder::class,
            couponStatusSeeder::class,
            couponSeeder::class,
            bookRecommentationSeeder::class,
        ]);
    }
}
