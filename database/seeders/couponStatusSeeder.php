<?php

namespace Database\Seeders;

use App\Models\Coupon;
use App\Models\CouponStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class couponStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('couponstatuses')->insert([
            [
                "is_active"=>CouponStatus::INACTIVE->name,
                'id'=>CouponStatus::INACTIVE->value
            ],
            [
                "is_active"=>CouponStatus::ACTIVE->name,
                'id'=>CouponStatus::ACTIVE->value
            ]
        ]);
    }
}
