<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('coupons')->insert([
            [
                'id' => 1,
                'campaign_name' => 'New Year 2023',
                'code' => 'NY2023',
                'discount_percentage' => 0,
                'discount_value' => 2,
                'start_date' => '2023-01-03 00:00:00',
                'end_date' => '2023-02-03 00:00:00',
                'category_id' => 2,
                'subcategory_id' => 4,
                'created_at' => Carbon::now()
            ],
            [
                'id' => 2,
                'campaign_name' => 'Basas Discount 2$',
                'code' => 'BASAS2',
                'discount_percentage' => 0,
                'discount_value' => 2,
                'start_date' => '2023-03-02 00:00:00',
                'end_date' => '2023-05-03 00:00:00',
                'category_id' => 2,
                'subcategory_id' => 4,
                'created_at' => Carbon::now()
            ],
            [
                'id' => 3,
                'campaign_name' => "Women's Day 15%",
                'code' => 'WD15',
                'discount_percentage' => 15,
                'discount_value' => 0,
                'start_date' => '2023-03-06 00:00:00',
                'end_date' => '2023-03-30 00:00:00',
                'category_id' => 2,
                'subcategory_id' => null,
                'created_at' => Carbon::now()
            ],
            [
                'id' => 4,
                'campaign_name' => 'Black Friday',
                'code' => 'BF25',
                'discount_percentage' => 25,
                'discount_value' => 0,
                'start_date' => '2023-05-03 00:00:00',
                'end_date' => '2023-06-03 00:00:00',
                'category_id' => 2,
                'subcategory_id' => 5,
                'created_at' => Carbon::now()
            ],

        ]);
    }
}
