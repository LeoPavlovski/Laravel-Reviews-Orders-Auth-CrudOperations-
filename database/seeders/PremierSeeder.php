<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

//$table->id();
//            $table->string('first_week');
//            $table->string('city');
//            $table->string('format');
//            $table->unsignedBigInteger('premier_id');
//            $table->foreign('premier_id')->references('id')->on('premier_types');
//            $table->timestamps();
class PremierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('premiers')->insert([
            [
                "first_week"=>'Week1',
                'city'=>'Tetovo',
                'format'=>'someformat',
                'premier_id'=>1
            ],
            [
                "first_week"=>'Week1',
                'city'=>'Tetovo',
                'format'=>'someformat',
                'premier_id'=>1
            ],
        ]);
    }
}
