<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'username' => 'Admin',
                'phone' => '02437347941',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('123456'),
                'role' => 0,
                'address' => 'Tầng 10, Tòa nhà An Phú số 24 Hoàng Quốc Việt, phường Nghĩa Đô, Quận Cầu Giấy, Hà Nội ',
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 2,
                'username' => 'Ponleuly',
                'phone' => '02437347942',
                'email' => 'ponleuly@gmail.com',
                'password' => bcrypt('123456'),
                'address' => 'Tầng 10, Tòa nhà An Phú số 24 Hoàng Quốc Việt, phường Nghĩa Đô, Quận Cầu Giấy, Hà Nội ',
                'role' => 1,
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 3,
                'username' => 'Matin',
                'phone' => '02437347943',
                'email' => 'matin@gmail.com',
                'password' => bcrypt('11223344'),
                'address' => 'Tầng 10, Tòa nhà An Phú số 24 Hoàng Quốc Việt, phường Nghĩa Đô, Quận Cầu Giấy, Hà Nội ',
                'role' => 1,
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 4,
                'username' => 'Zara Rechard',
                'phone' => '02437347944',
                'email' => 'zara@gmail.com',
                'password' => bcrypt('11223344'),
                'address' => 'Tầng 1, tòa Sen Xanh, 36 Trịnh Đình Thảo, phường Hòa Thạnh, Quận Tân Phú, TPHCM',
                'role' => 1,
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 5,
                'username' => 'Jack',
                'phone' => '02437347945',
                'email' => 'Jack@gmail.com',
                'password' => bcrypt('123456'),
                'address' => 'Tầng 1, tòa Sen Xanh, 36 Trịnh Đình Thảo, phường Hòa Thạnh, Quận Tân Phú, TPHCM',
                'role' => 1,
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 6,
                'username' => 'Jonh Henderson',
                'phone' => '02437347946',
                'email' => 'Jonh@gmail.com',
                'password' => bcrypt('123456'),
                'address' => 'Tầng 1, tòa Sen Xanh, 36 Trịnh Đình Thảo, phường Hòa Thạnh, Quận Tân Phú, TPHCM',
                'role' => 1,
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 7,
                'username' => 'Html',
                'phone' => '02437347947',
                'email' => 'html@gmail.com',
                'password' => bcrypt('123456'),
                'address' => 'Tầng 1, tòa Sen Xanh, 36 Trịnh Đình Thảo, phường Hòa Thạnh, Quận Tân Phú, TPHCM',
                'role' => 1,
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 8,
                'username' => 'CSS',
                'phone' => '02437347948',
                'email' => 'css@gmail.com',
                'password' => bcrypt('123456'),
                'address' => 'Tầng 1, tòa Sen Xanh, 36 Trịnh Đình Thảo, phường Hòa Thạnh, Quận Tân Phú, TPHCM',
                'role' => 1,
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 9,
                'username' => 'PHP',
                'phone' => '02437347949',
                'email' => 'php@gmail.com',
                'password' => bcrypt('123456'),
                'address' => 'Tầng 1, tòa Sen Xanh, 36 Trịnh Đình Thảo, phường Hòa Thạnh, Quận Tân Phú, TPHCM',
                'role' => 1,
                'created_at' => Carbon::now(),
            ],
        ]);
    }
}
