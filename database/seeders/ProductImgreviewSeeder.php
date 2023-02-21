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
        $j = 1;
        $k = 1;
        $x = 1;
        for ($i = 1; $i <= 12; $i++) {
            DB::table('products_imgreviews')->insert([
                [
                    'id' => $i,
                    'product_imgreview' => 'Pro_ba000' . $j . '_' . $k++ . '.jpg',
                    'product_id' => $x,
                    'created_at' => Carbon::now()
                ],
            ]);
            if ($i == $j * 4) $j++;
            if ($k == 5) $k = 1;
            if ($i == $x * 4) $x++;
        }
        //===========================================//
        $b = 1;
        $c = 1;
        $d = 4;
        for ($a = 13; $a <= 24; $a++) {
            DB::table('products_imgreviews')->insert([
                [
                    'id' => $a,
                    'product_imgreview' => 'Pro_va000' . $b . '_' . $c++ . '.jpg',
                    'product_id' => $d,
                    'created_at' => Carbon::now()
                ],
            ]);
            if ($a == $d * 4) $b++;
            if ($c == 5) $c = 1;
            if ($a == $d * 4) $d++;
        }
    }
}
    /*
            ['id' => 1, 'product_imgreview' => 'Pro_ba0001_1.jpg', 'product_id' => 1, 'created_at' => Carbon::now()],
            ['id' => 2, 'product_imgreview' => 'Pro_ba0001_2.jpg', 'product_id' => 1, 'created_at' => Carbon::now()],
            ['id' => 3, 'product_imgreview' => 'Pro_ba0001_3.jpg', 'product_id' => 1, 'created_at' => Carbon::now()],
            ['id' => 4, 'product_imgreview' => 'Pro_ba0001_4.jpg', 'product_id' => 1, 'created_at' => Carbon::now()],

            //=======================================================================================================//
            ['id' => 5, 'product_imgreview' => 'Pro_ba0002_1.jpg', 'product_id' => 2, 'created_at' => Carbon::now()],
            ['id' => 6, 'product_imgreview' => 'Pro_ba0002_2.jpg', 'product_id' => 2, 'created_at' => Carbon::now()],
            ['id' => 7, 'product_imgreview' => 'Pro_ba0002_3.jpg', 'product_id' => 2, 'created_at' => Carbon::now()],
            ['id' => 8, 'product_imgreview' => 'Pro_ba0002_4.jpg', 'product_id' => 2, 'created_at' => Carbon::now()],

            //=======================================================================================================//
            ['id' => 9, 'product_imgreview' => 'Pro_ba0003_1.jpg', 'product_id' => 3, 'created_at' => Carbon::now()],
            ['id' => 10, 'product_imgreview' => 'Pro_ba0003_2.jpg', 'product_id' => 3, 'created_at' => Carbon::now()],
            ['id' => 11, 'product_imgreview' => 'Pro_ba0003_3.jpg', 'product_id' => 3, 'created_at' => Carbon::now()],
            ['id' => 12, 'product_imgreview' => 'Pro_ba0003_4.jpg', 'product_id' => 3, 'created_at' => Carbon::now()],

            //=======================================================================================================//
            ['id' => 13, 'product_imgreview' => 'Pro_va0001_1.jpg', 'product_id' => 4, 'created_at' => Carbon::now()],
            ['id' => 14, 'product_imgreview' => 'Pro_va0001_2.jpg', 'product_id' => 4, 'created_at' => Carbon::now()],
            ['id' => 15, 'product_imgreview' => 'Pro_va0001_3.jpg', 'product_id' => 4, 'created_at' => Carbon::now()],
            ['id' => 16, 'product_imgreview' => 'Pro_va0001_4.jpg', 'product_id' => 4, 'created_at' => Carbon::now()],

            //=======================================================================================================//
            ['id' => 17, 'product_imgreview' => 'Pro_va0002_1.jpg', 'product_id' => 5, 'created_at' => Carbon::now()],
            ['id' => 18, 'product_imgreview' => 'Pro_va0002_2.jpg', 'product_id' => 5, 'created_at' => Carbon::now()],
            ['id' => 19, 'product_imgreview' => 'Pro_va0002_3.jpg', 'product_id' => 5, 'created_at' => Carbon::now()],
            ['id' => 20, 'product_imgreview' => 'Pro_va0002_4.jpg', 'product_id' => 5, 'created_at' => Carbon::now()],

            //=======================================================================================================//
            ['id' => 21, 'product_imgreview' => 'Pro_va0003_1.jpg', 'product_id' => 6, 'created_at' => Carbon::now()],
            ['id' => 22, 'product_imgreview' => 'Pro_va0003_2.jpg', 'product_id' => 6, 'created_at' => Carbon::now()],
            ['id' => 23, 'product_imgreview' => 'Pro_va0003_3.jpg', 'product_id' => 6, 'created_at' => Carbon::now()],
            ['id' => 24, 'product_imgreview' => 'Pro_va0003_4.jpg', 'product_id' => 6, 'created_at' => Carbon::now()],
            */