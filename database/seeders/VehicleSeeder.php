<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehicleSeeder extends Seeder
{
    //  'brand_id',
    //        'company_id',
    //        'type_id',
    //        'user_id',
    //        'registration',
    //        'date_of_production',
    //        'manufacturer',
    //        'price_for_day'
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('vehicles')->insert([
         [      'brand_id'=>2,
                'company_id'=>1,
              'type_id'=>1,
              'user_id'=>1,
              'registration'=>'#MKD1234',
              'date_of_production'=>'2023-10-10',
              'manufacturer'=>'Test123',
              'price_for_day'=>200,
             'consumption'=>20
         ],
            [   'brand_id'=>3,
                'company_id'=>1,
                'type_id'=>1,
                'user_id'=>1,
                'registration'=>'#MKD12314',
                'date_of_production'=>'2023-10-12',
                'manufacturer'=>'Test123',
                'price_for_day'=>500,
                 'consumption'=>30
            ],
        ]);
    }
}
