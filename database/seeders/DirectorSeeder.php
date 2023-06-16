<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DirectorSeeder extends Seeder
{
//        $table->string('name');
//            $table->string('surname');
//            $table->string('expertise');
//            $table->string('genre');

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('directors')->insert([
            [
                "name"=>'leo',
                'surname'=>'something',
                'expertise'=>'123213',
                'genre'=>'action'
            ],
            [
                "name"=>'leo',
                'surname'=>'something',
                'expertise'=>'123213',
                'genre'=>'action'
            ],
        ]);
    }
}
