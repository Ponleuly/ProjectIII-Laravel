<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 50; $i++) {
            DB::table('orders')->insert([
                'invoice_code' => '#iv' . sprintf('%04d', $i),
                'user_id' => 0,
                'order_status' => rand(1, 4),
                'discount' => floatval(rand(2, 5)),
                'delivery_fee' => 2.00,
                'payment_method' => rand(0, 1) ? 'Bank' : 'Cash',
                'created_at' => Carbon::now()

                //'customer_id ' => Str::random(10) . '@gmail.com',
            ]);
        }
    }
}
