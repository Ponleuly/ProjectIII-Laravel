<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductImgreviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products_imgreviews')->insert([
            [
                'id' => 1, 'product_imgreview' => 'Pro_AV0001_1.jpg', 'product_id' => 1, 'created_at' => Carbon::now()
            ],
            [
                'id' => 2, 'product_imgreview' => 'Pro_AV0001_2.jpg', 'product_id' => 1, 'created_at' => Carbon::now()
            ],
            [
                'id' => 3, 'product_imgreview' => 'Pro_AV0001_3.jpg', 'product_id' => 1, 'created_at' => Carbon::now()
            ],
            [
                'id' => 4, 'product_imgreview' => 'Pro_AV0001_4.jpg', 'product_id' => 1, 'created_at' => Carbon::now()
            ],

            //=======================================================================================================//
            [
                'id' => 5, 'product_imgreview' => 'Pro_AV0002_1.jpg', 'product_id' => 2, 'created_at' => Carbon::now()
            ],
            [
                'id' => 6, 'product_imgreview' => 'Pro_AV0002_2.jpg', 'product_id' => 2, 'created_at' => Carbon::now()
            ],
            [
                'id' => 7, 'product_imgreview' => 'Pro_AV0002_3.jpg', 'product_id' => 2, 'created_at' => Carbon::now()
            ],
            [
                'id' => 8, 'product_imgreview' => 'Pro_AV0002_4.jpg', 'product_id' => 2, 'created_at' => Carbon::now()
            ],


        ]);
    }
}
