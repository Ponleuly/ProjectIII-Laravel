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
                'group_id' => 1,
                'category_id' => 2,
                'subcategory_id' => 4,
            ],
            [
                'id' => 2,
                'campaign_name' => 'Chrismas 2023',
                'code' => 'CH2023',
                'discount_percentage' => 15,
                'discount_value' => 0,
                'start_date' => '2023-03-02 00:00:00',
                'end_date' => '2023-05-03 00:00:00',
                'group_id' => 1,
                'category_id' => 2,
                'subcategory_id' => 4,
            ],
            [
                'id' => 3,
                'campaign_name' => 'Black Friday',
                'code' => 'BF25',
                'discount_percentage' => 25,
                'discount_value' => 0,
                'start_date' => '2023-05-03 00:00:00',
                'end_date' => '2023-06-03 00:00:00',
                'group_id' => 1,
                'category_id' => 2,
                'subcategory_id' => 5,
            ],

        ]);
    }
}
