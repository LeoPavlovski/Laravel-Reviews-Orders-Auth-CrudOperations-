<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgentSeeder extends Seeder
{
//     $table->id();
//            $table->string('name');
//            $table->string('code');
//            $table->timestamps();

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('agents')->insert([
         [
             "name"=>'leo',
             'code'=>'MKD123##',

         ],
            [
                "name"=>'Marko',
                'code'=>'ADJ##11##',

            ],
            [
                "name"=>'Agent',
                'code'=>'lasdkd',
            ]
        ]);
    }
}
