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
        for ($i = 1; $i <= 66; $i++) {
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
    }
}
