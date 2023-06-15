<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('invoices')->insert(
            [
                [
                    'number_of_invoice'=>20,
                    'price'=>20,
                    'date_of_issue'=>'2021-10-10',
                    'vehicle_id'=>1,
                    'company_id'=>1,
                ] ,
                [
                    'number_of_invoice'=>19,
                    'price'=>203,
                    'date_of_issue'=>'2021-10-10',
                    'vehicle_id'=>1,
                    'company_id'=>1,
                ]
            ],
        );
    }
}
