<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('companies')->insert([
            [ 'name'=>'Facebook',
                'address'=>'Washington Avenue 203',
                'tax'=>1000],
            [
                'name'=>'Twitter',
                'address'=>'Washington Avenue 202',
                'tax'=>1000
            ],
            [
                'name'=>'Tesla',
                'address'=>'Washington Avenue 203',
                'tax'=>1000
            ],
        ]);
    }
}
