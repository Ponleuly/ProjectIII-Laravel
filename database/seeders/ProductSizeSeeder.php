<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSizeSeeder extends Seeder
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
        for ($i = 1; $i <= 110; $i++) {
            DB::table('products_sizes')->insert([
                [
                    'id' => $i,
                    'product_id' => $j,
                    'size_id' => $k++,
                    'size_quantity' => 10,
                    'created_at' => Carbon::now()
                ],
            ]);

            if ($i == $j * 11) $j++;
            if ($k == 12) $k = 1;
        }
        DB::table('products_sizes')->insert([
            [
                'id' => 111,
                'product_id' => 11,
                'size_id' => 12,
                'size_quantity' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'id' => 112,
                'product_id' => 12,
                'size_id' => 12,
                'size_quantity' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'id' => 113,
                'product_id' => 13,
                'size_id' => 12,
                'size_quantity' => 10,
                'created_at' => Carbon::now()
            ],
        ]);
    }
}