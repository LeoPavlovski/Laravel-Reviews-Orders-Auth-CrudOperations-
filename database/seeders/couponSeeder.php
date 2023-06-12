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
         [ "code" => "STU678",
             "description" => "Birthday discount code for registered users",
             "name" => "Birthday Discount",
             "valid_from" => "2023-01-01",
             "valid_until" => "2023-12-31",
             "book_id" => 8,
             "is_active" => 1],
            [
                "code" => "XYZ456",
                "description" => "A special promotional code",
                "name" => "Promo Code 1",
                "valid_from" => "2022-01-01",
                "valid_until" => "2022-12-31",
                "book_id" => 1,
                "is_active" => 1
            ],
            [
                "code" => "DEF789",
                "description" => "Discount code for new customers",
                "name" => "New Customer Discount",
                "valid_from" => "2023-05-01",
                "valid_until" => "2023-06-30",
                "book_id" => 2,
                "is_active" => 1
            ],
            [
                "code" => "PQR321",
                "description" => "Limited-time offer code",
                "name" => "Flash Sale Code",
                "valid_from" => "2023-07-15",
                "valid_until" => "2023-07-20",
                "book_id" => 3,
                "is_active" => 1
            ],
            [
                "code" => "GHI654",
                "description" => "Exclusive code for premium members",
                "name" => "Premium Member Code",
                "valid_from" => "2023-08-01",
                "valid_until" => "2023-09-30",
                "book_id" => 4,
                "is_active" => 1
            ],
            [
                "code" => "MNO987",
                "description" => "Holiday season discount code",
                "name" => "Holiday Sale Code",
                "valid_from" => "2023-11-15",
                "valid_until" => "2023-12-31",
                "book_id" => 5,
                "is_active" => 1
            ],
            [
                "code" => "JKL012",
                "description" => "Referral code for new users",
                "name" => "Referral Program Code",
                "valid_from" => "2022-03-01",
                "valid_until" => "2024-02-28",
                "book_id" => 6,
                "is_active" => 1
            ],
            [
                "code" => "VWX345",
                "description" => "Code for free shipping on orders over $50",
                "name" => "Free Shipping Code",
                "valid_from" => "2022-06-01",
                "valid_until" => "2022-12-31",
                "book_id" => 7,
                "is_active" => 1
            ],
        ]);
    }
}
