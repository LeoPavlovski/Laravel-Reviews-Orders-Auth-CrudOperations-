<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TVSeeder extends Seeder
{
//   $table->id();
//            $table->string('tv_channel');
//            $table->string('episodes');
//            $table->unsignedBigInteger('actor_id');
//            $table->foreign('actor_id')->references('id')->on('actors');
//            $table->timestamps();

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tvs')->insert([
            [
                "tv_channel"=>'telma',
                'episodes'=>'something',
                'actor_id'=>1,
            ],
            [
                "tv_channel"=>'sitel',
                'episodes'=>'something',
                'actor_id'=>1,
            ],
        ]);
    }
}
