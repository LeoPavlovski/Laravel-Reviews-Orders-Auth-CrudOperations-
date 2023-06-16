<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FilmSeeder extends Seeder
{
    //  $table->id();
    //            $table->string('premier_week');
    //            $table->string('city');
    //            $table->string('format');
    //            $table->unsignedBigInteger('oscar_id');
    //            $table->foreign('oscar_id')->references('id')->on('oscars');
    //            $table->timestamps();

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('films')->insert([
            [
                "premier_week"=>'week1',
                'city'=>'Tetovo',
                'format'=>'dadwdasd',
                'oscar_id'=>1
            ],
            [
                "premier_week"=>'week1',
                'city'=>'Tetovo',
                'format'=>'dadwdasd',
                'oscar_id'=>1
            ],
        ]);
    }
}
