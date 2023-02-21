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
                'product_code' => 'av0001',
                'product_des' => '<ul>
                                    <li>Gender: Unisex</li>
                                    <li>Size run: 34 – 44</li>
                                    <li>Upper: Canvas NE</li>
                                    <li>Outsole: Rubber</li>
                                </ul>',
                'product_price' => 22.00,
                'product_saleprice' => 22.00,
                'product_imgcover' => 'Pro_AV0001_1.jpg',
                'product_color' => '#000091',
                'category_id' => 2,
                'subcategory_id' => 4,
                'created_at' => Carbon::now()
            ],
            [
                'id' => 2,
                'product_name' => 'Basas Workaday - Low Top - Black',
                'product_code' => 'av0002',
                'product_des' => '<ul>
                                    <li>Gender: Unisex</li>
                                    <li>Size run: 34 – 44</li>
                                    <li>Upper: Canvas NE</li>
                                    <li>Outsole: Rubber</li>
                                </ul>',
                'product_price' => 22.00,
                'product_saleprice' => 22.00,
                'product_imgcover' => 'Pro_AV0002_1.jpg',
                'product_color' => '#000000',
                'category_id' => 2,
                'subcategory_id' => 4,
                'created_at' => Carbon::now()
            ],
        ]);
    }
}
