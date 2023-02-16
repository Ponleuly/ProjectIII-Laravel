<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('colors')->insert([
            ['id' => 1, 'color_name' => "#ff0000", 'created_at' => Carbon::now()],
            ['id' => 2, 'color_name' => "#0080ff", 'created_at' => Carbon::now()],
            ['id' => 3, 'color_name' => "#c0c0c0", 'created_at' => Carbon::now()],
            ['id' => 4, 'color_name' => "#000000", 'created_at' => Carbon::now()],
            ['id' => 5, 'color_name' => "#ff8040", 'created_at' => Carbon::now()],
            ['id' => 6, 'color_name' => "#8080ff", 'created_at' => Carbon::now()],

        ]);
    }
}
