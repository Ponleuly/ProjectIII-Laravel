<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'id' => 1,
                'product_name' => 'Basas Workaday - Low Top - Real Teal',
                'product_code' => 'ba0001',
                'product_des' => '<ul><li>Gender: Unisex</li><li>Size run: 34 – 44</li><li>Upper: Canvas NE</li><li>Outsole: Rubber</li></ul>',
                'product_price' => 22.00,
                'product_saleprice' => 22.00,
                'product_imgcover' => 'Pro_ba0001_1.jpg',
                'product_color' => '#000091',
                'category_id' => 2,
                'subcategory_id' => 4,
                'created_at' => Carbon::now()
            ],

            [
                'id' => 2,
                'product_name' => 'Basas Workaday - Low Top - Black',
                'product_code' => 'ba0002',
                'product_des' => '<ul><li>Gender: Unisex</li><li>Size run: 34 – 44</li><li>Upper: Canvas NE</li><li>Outsole: Rubber</li></ul>',
                'product_price' => 22.00,
                'product_saleprice' => 22.00,
                'product_imgcover' => 'Pro_ba0002_1.jpg',
                'product_color' => '#000000',
                'category_id' => 2,
                'subcategory_id' => 4,
                'created_at' => Carbon::now()
            ],

            [
                'id' => 3,
                'product_name' => 'Basas Evergreen - Low Top - Evergreen',
                'product_code' => 'ba0003',
                'product_des' => '<ul><li>Gender: Unisex</li><li>Size run: 34 – 44</li><li>Upper: Canvas NE</li><li>Outsole: Rubber</li></ul>',
                'product_price' => 22.00,
                'product_saleprice' => 22.00,
                'product_imgcover' => 'Pro_ba0003_1.jpg',
                'product_color' => '#408080',
                'category_id' => 2,
                'subcategory_id' => 4,
                'created_at' => Carbon::now()
            ],

            [
                'id' => 4,
                'product_name' => 'Vintas Landforms - Low Top - Marmalade',
                'product_code' => 'va0001',
                'product_des' => '<ul><li>Gender: Unisex</li><li>Size run: 34 – 44</li><li>Upper: Canvas NE</li><li>Outsole: Rubber</li></ul>',
                'product_price' => 25.00,
                'product_saleprice' => 25.00,
                'product_imgcover' => 'Pro_va0001_1.jpg',
                'product_color' => '#ff8000',
                'category_id' => 2,
                'subcategory_id' => 5,
                'created_at' => Carbon::now()
            ],

            [
                'id' => 5,
                'product_name' => 'Vintas Landforms - Low Top - Rain Drum',
                'product_code' => 'va0002',
                'product_des' => '<ul><li>Gender: Unisex</li><li>Size run: 34 – 44</li><li>Upper: Canvas NE</li><li>Outsole: Rubber</li></ul>',
                'product_price' => 25.00,
                'product_saleprice' => 25.00,
                'product_imgcover' => 'Pro_va0002_1.jpg',
                'product_color' => '#804000',
                'category_id' => 2,
                'subcategory_id' => 5,
                'created_at' => Carbon::now()
            ],

            [
                'id' => 6,
                'product_name' => 'Vintas Landforms - Low Top - Green Moss',
                'product_code' => 'va0003',
                'product_des' => '<ul><li>Gender: Unisex</li><li>Size run: 34 – 44</li><li>Upper: Canvas NE</li><li>Outsole: Rubber</li></ul>',
                'product_price' => 25.00,
                'product_saleprice' => 25.00,
                'product_imgcover' => 'Pro_va0003_1.jpg',
                'product_color' => '#808040',
                'category_id' => 2,
                'subcategory_id' => 5,
                'created_at' => Carbon::now()
            ],
        ]);
    }
}
