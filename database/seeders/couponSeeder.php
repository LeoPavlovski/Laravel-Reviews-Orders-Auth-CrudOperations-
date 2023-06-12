<?php

namespace Database\Seeders;

use App\Models\CouponStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class couponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('coupons')->insert([
          "code"=>"some code",
            "description"=>"description1",
            "name"=>"test name",
            "valid_from"=>"2001-10-10",
            "valid_until"=>"2003-10-10",
            "book_id"=>1,
            'is_active'=>1
        ]);
    }
}
