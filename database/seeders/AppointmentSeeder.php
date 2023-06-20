<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('appointments')->insert([
            [
              'start_date'=>'2023-10-10 10:50:00',
              'end_date'=>'2023-10-10 11:50:00',
//              Is this the user who is going to be here
               'user_id'=>2,
                'doctor_id'=>1
            ],
            [
                'start_date'=>'2023-10-10 09:50:00',
                'end_date'=>'2023-10-10 11:50:00',
//              Is this the user who is going to be here
                'user_id'=>2,
                'doctor_id'=>1
            ],
            [
                'start_date'=>'2023-10-10 08:25:30',
                'end_date'=>'2023-10-10 09:50:00',
//              Is this the user who is going to be here
                'user_id'=>2,
                'doctor_id'=>1
            ],
        ]);
    }
}
