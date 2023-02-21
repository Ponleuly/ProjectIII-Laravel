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
        $j = 1;
        $k = 1;
        for ($i = 1; $i <= 12; $i++) {
            DB::table('products_groups')->insert([
                [
                    'id' => $i,
                    'group_id' => $j++,
                    'product_id' => $k,
                    'created_at' => Carbon::now()
                ],

            ]);
            if ($j == 3) $j = 1;
            if (($i % $j) == 0) $k++;
        }
    }
}
