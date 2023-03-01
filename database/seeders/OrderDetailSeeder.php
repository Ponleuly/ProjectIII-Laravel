<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrderDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 50; $i++) {
            DB::table('orders_details')->insert([
                'order_id' => $i,
                'product_id' => rand(1, 13),
                'product_price' => floatval(rand(22, 25)),
                'product_quantity' => rand(1, 2),
                'size_id' => rand(1, 12),
                'discount' => floatval(rand(2, 5)),
                'delivery_fee' => 2.00,
                'payment_method' => rand(0, 1) ? 'Bank' : 'Cash',
                'created_at' => Carbon::now()

                //'customer_id ' => Str::random(10) . '@gmail.com',
            ]);
        }
    }
}
