<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['id' => 1, 'category_name' => "New & Featured", 'created_at' => Carbon::now()],
            ['id' => 2, 'category_name' => "Shoes", 'created_at' => Carbon::now()],
            ['id' => 3, 'category_name' => "Accessories", 'created_at' => Carbon::now()],
        ]);
    }
}
