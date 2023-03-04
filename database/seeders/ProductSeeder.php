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
                'product_stock' => 110,
                'product_status' => 2,
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
                'product_stock' => 110,
                'product_status' => 2,
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
                'product_stock' => 110,
                'product_status' => 2,
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
                'product_stock' => 110,
                'product_status' => 2,
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
                'product_stock' => 110,
                'product_status' => 2,
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
                'product_stock' => 110,
                'product_status' => 2,
                'created_at' => Carbon::now()
            ],

            [
                'id' => 7,
                'product_name' => 'Urbas SC - Mule - Dusty Blue',
                'product_code' => 'ua0001',
                'product_des' => '<ul><li>Gender: Unisex</li><li>Size run: 34 – 44</li><li>Upper: Canvas NE</li><li>Outsole: Rubber</li></ul>',
                'product_price' => 25.00,
                'product_saleprice' => 25.00,
                'product_imgcover' => 'Pro_ua0001_1.jpg',
                'product_color' => '#64b1ff',
                'product_stock' => 110,
                'product_status' => 2,
                'created_at' => Carbon::now()
            ],

            [
                'id' => 8,
                'product_name' => 'Urbas SC - Mule - Dark Purple',
                'product_code' => 'ua0002',
                'product_des' => '<ul><li>Gender: Unisex</li><li>Size run: 34 – 44</li><li>Upper: Canvas NE</li><li>Outsole: Rubber</li></ul>',
                'product_price' => 25.00,
                'product_saleprice' => 25.00,
                'product_imgcover' => 'Pro_ua0002_1.jpg',
                'product_color' => '#800040',
                'product_stock' => 110,
                'product_status' => 2,
                'created_at' => Carbon::now()
            ],

            [
                'id' => 9,
                'product_name' => 'Urbas SC - Mule - Cornsilk',
                'product_code' => 'ua0003',
                'product_des' => '<ul><li>Gender: Unisex</li><li>Size run: 34 – 44</li><li>Upper: Canvas NE</li><li>Outsole: Rubber</li></ul>',
                'product_price' => 25.00,
                'product_saleprice' => 25.00,
                'product_imgcover' => 'Pro_ua0003_1.jpg',
                'product_color' => '#ffff00',
                'product_stock' => 110,
                'product_status' => 2,
                'created_at' => Carbon::now()
            ],

            [
                'id' => 10,
                'product_name' => 'Urbas SC - Mule - Foliage',
                'product_code' => 'ua0004',
                'product_des' => '<ul><li>Gender: Unisex</li><li>Size run: 34 – 44</li><li>Upper: Canvas NE</li><li>Outsole: Rubber</li></ul>',
                'product_price' => 25.00,
                'product_saleprice' => 25.00,
                'product_imgcover' => 'Pro_ua0004_1.jpg',
                'product_color' => '#008000',
                'product_stock' => 110,
                'product_status' => 2,
                'created_at' => Carbon::now()
            ],

            [
                'id' => 11,
                'product_name' => 'Trucker Hat - Be Positive - Black/White',
                'product_code' => 'hac0001',
                'product_des' => '<ul><li>Gender – /Unisex/</li><li>Size: Free Hoạ tiết – /Be Positive/</li><li>Chất liệu – /100% Polyester/</li><li>Thêu 2D đơn giản</li></ul>',
                'product_price' => 10.00,
                'product_saleprice' => 10.00,
                'product_imgcover' => 'Pro_hac0001_1.jpg',
                'product_color' => '#ebebeb',
                'product_status' => 2,
                'product_stock' => 10,
                'created_at' => Carbon::now()
            ],

            [
                'id' => 12,
                'product_name' => 'Baseball Cap - Live In The Moment - Slate',
                'product_code' => 'hac0002',
                'product_des' => '<ul><li>Thông điệp – /Live in the moment/</li><li>Chất liệu – /100% cotton/</li><li>Màu sắc – /Slate/</li><li>Họa tiết thêu 2D</li></ul>',
                'product_price' => 10.00,
                'product_saleprice' => 10.00,
                'product_imgcover' => 'Pro_hac0002_1.jpg',
                'product_color' => '#0080ff',
                'product_stock' => 10,
                'product_status' => 2,
                'created_at' => Carbon::now()
            ],

            [
                'id' => 13,
                'product_name' => 'Bucket Hat - Go Skate - Beige',
                'product_code' => 'hac0003',
                'product_des' => '<ul><li>Gender – /Unisex/</li><li>Size: Free</li><li>Họa tiết – /Go Skate/</li><li>Chất liệu – /100% Cotton/</li><li>Tem dệt sắc nét</li></ul>',
                'product_price' => 11.00,
                'product_saleprice' => 11.00,
                'product_imgcover' => 'Pro_hac0003_1.jpg',
                'product_color' => '#ffe1c4',
                'product_stock' => 10,
                'product_status' => 2,
                'created_at' => Carbon::now()
            ],
        ]);
    }
}
