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
        DB::table('products_sizes')->insert([
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
        ]);
    }
}
