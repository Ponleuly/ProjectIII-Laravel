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
            ['id' => 1, 'category_name' => "Basas", 'created_at' => Carbon::now()],
            ['id' => 2, 'category_name' => "Vitas", 'created_at' => Carbon::now()],
            ['id' => 3, 'category_name' => "Urbas", 'created_at' => Carbon::now()],
            ['id' => 4, 'category_name' => "Pattas", 'created_at' => Carbon::now()],
            ['id' => 5, 'category_name' => "Hats", 'created_at' => Carbon::now()],

        ]);
    }
}
