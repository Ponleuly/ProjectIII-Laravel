<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products_groups')->insert([
            ['id' => 1, 'group_id' => 1, 'product_id' => 1, 'created_at' => Carbon::now()],
            ['id' => 2, 'group_id' => 2, 'product_id' => 1, 'created_at' => Carbon::now()],

            ['id' => 3, 'group_id' => 1, 'product_id' => 2, 'created_at' => Carbon::now()],
            ['id' => 4, 'group_id' => 2, 'product_id' => 2, 'created_at' => Carbon::now()],

            ['id' => 5, 'group_id' => 1, 'product_id' => 3, 'created_at' => Carbon::now()],
            ['id' => 6, 'group_id' => 2, 'product_id' => 3, 'created_at' => Carbon::now()],

            ['id' => 7, 'group_id' => 1, 'product_id' => 4, 'created_at' => Carbon::now()],
            ['id' => 8, 'group_id' => 2, 'product_id' => 4, 'created_at' => Carbon::now()],

            ['id' => 9, 'group_id' => 1, 'product_id' => 5, 'created_at' => Carbon::now()],
            ['id' => 10, 'group_id' => 2, 'product_id' => 5, 'created_at' => Carbon::now()],

            ['id' => 11, 'group_id' => 1, 'product_id' => 6, 'created_at' => Carbon::now()],
            ['id' => 12, 'group_id' => 2, 'product_id' => 6, 'created_at' => Carbon::now()],
        ]);
    }
}
