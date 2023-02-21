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
        ]);
    }
}
