<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Db::table('brands')->insert([
           [ 'name'=>'Audi'],
            ['name'=>'Ford'],
            ['name'=>'Yugo']
        ]);
    }
}
