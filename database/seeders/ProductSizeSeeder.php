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
        //for ($i = 1; $i <= 66; $i++) {
        DB::table('products_sizes')->insert([
            // ['id' => $i, 'product_id' => 1, 'size_id' => 1, 'size_quantity' => 5, 'created_at' => Carbon::now()],

            ['id' => 1, 'product_id' => 1, 'size_id' => 1, 'size_quantity' => 5, 'created_at' => Carbon::now()],
            ['id' => 2, 'product_id' => 1, 'size_id' => 2, 'size_quantity' => 5, 'created_at' => Carbon::now()],
            ['id' => 3, 'product_id' => 1, 'size_id' => 3, 'size_quantity' => 5, 'created_at' => Carbon::now()],
            ['id' => 4, 'product_id' => 1, 'size_id' => 4, 'size_quantity' => 5, 'created_at' => Carbon::now()],
            ['id' => 5, 'product_id' => 1, 'size_id' => 5, 'size_quantity' => 5, 'created_at' => Carbon::now()],
            ['id' => 6, 'product_id' => 1, 'size_id' => 6, 'size_quantity' => 5, 'created_at' => Carbon::now()],
            ['id' => 7, 'product_id' => 1, 'size_id' => 7, 'size_quantity' => 5, 'created_at' => Carbon::now()],
            ['id' => 8, 'product_id' => 1, 'size_id' => 8, 'size_quantity' => 5, 'created_at' => Carbon::now()],
            ['id' => 9, 'product_id' => 1, 'size_id' => 9, 'size_quantity' => 5, 'created_at' => Carbon::now()],
            ['id' => 10, 'product_id' => 1, 'size_id' => 10, 'size_quantity' => 5, 'created_at' => Carbon::now()],
            ['id' => 11, 'product_id' => 1, 'size_id' => 11, 'size_quantity' => 5, 'created_at' => Carbon::now()],

            ['id' => 12, 'product_id' => 2, 'size_id' => 1, 'size_quantity' => 10, 'created_at' => Carbon::now()],
            ['id' => 13, 'product_id' => 2, 'size_id' => 2, 'size_quantity' => 10, 'created_at' => Carbon::now()],
            ['id' => 14, 'product_id' => 2, 'size_id' => 3, 'size_quantity' => 10, 'created_at' => Carbon::now()],
            ['id' => 15, 'product_id' => 2, 'size_id' => 4, 'size_quantity' => 10, 'created_at' => Carbon::now()],
            ['id' => 16, 'product_id' => 2, 'size_id' => 5, 'size_quantity' => 10, 'created_at' => Carbon::now()],
            ['id' => 17, 'product_id' => 2, 'size_id' => 6, 'size_quantity' => 10, 'created_at' => Carbon::now()],
            ['id' => 18, 'product_id' => 2, 'size_id' => 7, 'size_quantity' => 10, 'created_at' => Carbon::now()],
            ['id' => 19, 'product_id' => 2, 'size_id' => 8, 'size_quantity' => 10, 'created_at' => Carbon::now()],
            ['id' => 20, 'product_id' => 2, 'size_id' => 9, 'size_quantity' => 10, 'created_at' => Carbon::now()],
            ['id' => 21, 'product_id' => 2, 'size_id' => 10, 'size_quantity' => 10, 'created_at' => Carbon::now()],
            ['id' => 22, 'product_id' => 2, 'size_id' => 11, 'size_quantity' => 10, 'created_at' => Carbon::now()],

            ['id' => 23, 'product_id' => 3, 'size_id' => 1, 'size_quantity' => 10, 'created_at' => Carbon::now()],
            ['id' => 24, 'product_id' => 3, 'size_id' => 2, 'size_quantity' => 10, 'created_at' => Carbon::now()],
            ['id' => 25, 'product_id' => 3, 'size_id' => 3, 'size_quantity' => 10, 'created_at' => Carbon::now()],
            ['id' => 26, 'product_id' => 3, 'size_id' => 4, 'size_quantity' => 10, 'created_at' => Carbon::now()],
            ['id' => 27, 'product_id' => 3, 'size_id' => 5, 'size_quantity' => 10, 'created_at' => Carbon::now()],
            ['id' => 28, 'product_id' => 3, 'size_id' => 6, 'size_quantity' => 10, 'created_at' => Carbon::now()],
            ['id' => 29, 'product_id' => 3, 'size_id' => 7, 'size_quantity' => 10, 'created_at' => Carbon::now()],
            ['id' => 30, 'product_id' => 3, 'size_id' => 8, 'size_quantity' => 10, 'created_at' => Carbon::now()],
            ['id' => 31, 'product_id' => 3, 'size_id' => 9, 'size_quantity' => 10, 'created_at' => Carbon::now()],
            ['id' => 32, 'product_id' => 3, 'size_id' => 10, 'size_quantity' => 10, 'created_at' => Carbon::now()],
            ['id' => 33, 'product_id' => 3, 'size_id' => 11, 'size_quantity' => 10, 'created_at' => Carbon::now()],

            ['id' => 34, 'product_id' => 4, 'size_id' => 1, 'size_quantity' => 10, 'created_at' => Carbon::now()],
            ['id' => 35, 'product_id' => 4, 'size_id' => 2, 'size_quantity' => 10, 'created_at' => Carbon::now()],
            ['id' => 36, 'product_id' => 4, 'size_id' => 3, 'size_quantity' => 10, 'created_at' => Carbon::now()],
            ['id' => 37, 'product_id' => 4, 'size_id' => 4, 'size_quantity' => 10, 'created_at' => Carbon::now()],
            ['id' => 38, 'product_id' => 4, 'size_id' => 5, 'size_quantity' => 10, 'created_at' => Carbon::now()],
            ['id' => 39, 'product_id' => 4, 'size_id' => 6, 'size_quantity' => 10, 'created_at' => Carbon::now()],
            ['id' => 40, 'product_id' => 4, 'size_id' => 7, 'size_quantity' => 10, 'created_at' => Carbon::now()],
            ['id' => 41, 'product_id' => 4, 'size_id' => 8, 'size_quantity' => 10, 'created_at' => Carbon::now()],
            ['id' => 42, 'product_id' => 4, 'size_id' => 9, 'size_quantity' => 10, 'created_at' => Carbon::now()],
            ['id' => 43, 'product_id' => 4, 'size_id' => 10, 'size_quantity' => 10, 'created_at' => Carbon::now()],
            ['id' => 44, 'product_id' => 4, 'size_id' => 11, 'size_quantity' => 10, 'created_at' => Carbon::now()],

            ['id' => 45, 'product_id' => 5, 'size_id' => 1, 'size_quantity' => 10, 'created_at' => Carbon::now()],
            ['id' => 46, 'product_id' => 5, 'size_id' => 2, 'size_quantity' => 10, 'created_at' => Carbon::now()],
            ['id' => 47, 'product_id' => 5, 'size_id' => 3, 'size_quantity' => 10, 'created_at' => Carbon::now()],
            ['id' => 48, 'product_id' => 5, 'size_id' => 4, 'size_quantity' => 10, 'created_at' => Carbon::now()],
            ['id' => 49, 'product_id' => 5, 'size_id' => 5, 'size_quantity' => 10, 'created_at' => Carbon::now()],
            ['id' => 50, 'product_id' => 5, 'size_id' => 6, 'size_quantity' => 10, 'created_at' => Carbon::now()],
            ['id' => 51, 'product_id' => 5, 'size_id' => 7, 'size_quantity' => 10, 'created_at' => Carbon::now()],
            ['id' => 52, 'product_id' => 5, 'size_id' => 8, 'size_quantity' => 10, 'created_at' => Carbon::now()],
            ['id' => 53, 'product_id' => 5, 'size_id' => 9, 'size_quantity' => 10, 'created_at' => Carbon::now()],
            ['id' => 54, 'product_id' => 5, 'size_id' => 10, 'size_quantity' => 10, 'created_at' => Carbon::now()],
            ['id' => 55, 'product_id' => 5, 'size_id' => 11, 'size_quantity' => 10, 'created_at' => Carbon::now()],

            ['id' => 56, 'product_id' => 6, 'size_id' => 1, 'size_quantity' => 10, 'created_at' => Carbon::now()],
            ['id' => 57, 'product_id' => 6, 'size_id' => 2, 'size_quantity' => 10, 'created_at' => Carbon::now()],
            ['id' => 58, 'product_id' => 6, 'size_id' => 3, 'size_quantity' => 10, 'created_at' => Carbon::now()],
            ['id' => 59, 'product_id' => 6, 'size_id' => 4, 'size_quantity' => 10, 'created_at' => Carbon::now()],
            ['id' => 60, 'product_id' => 6, 'size_id' => 5, 'size_quantity' => 10, 'created_at' => Carbon::now()],
            ['id' => 61, 'product_id' => 6, 'size_id' => 6, 'size_quantity' => 10, 'created_at' => Carbon::now()],
            ['id' => 62, 'product_id' => 6, 'size_id' => 7, 'size_quantity' => 10, 'created_at' => Carbon::now()],
            ['id' => 63, 'product_id' => 6, 'size_id' => 8, 'size_quantity' => 10, 'created_at' => Carbon::now()],
            ['id' => 64, 'product_id' => 6, 'size_id' => 9, 'size_quantity' => 10, 'created_at' => Carbon::now()],
            ['id' => 65, 'product_id' => 6, 'size_id' => 10, 'size_quantity' => 10, 'created_at' => Carbon::now()],
            ['id' => 66, 'product_id' => 6, 'size_id' => 11, 'size_quantity' => 10, 'created_at' => Carbon::now()],
        ]);
        //}
    }
}
