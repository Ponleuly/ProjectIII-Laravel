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
                'name' => 'Admin',
                'phone' => '02437347941',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 0,
                'address' => 'Tầng 10, Tòa nhà An Phú số 24 Hoàng Quốc Việt, phường Nghĩa Đô, Quận Cầu Giấy, Hà Nội ',
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 2,
                'name' => 'Ponleuly',
                'phone' => '02437347942',
                'email' => 'lyponleu116@gmail.com',
                'password' => bcrypt('12345678'),
                'address' => 'Tầng 10, Tòa nhà An Phú số 24 Hoàng Quốc Việt, phường Nghĩa Đô, Quận Cầu Giấy, Hà Nội ',
                'role' => 1,
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 3,
                'name' => 'User1',
                'phone' => '02437347943',
                'email' => 'user1@gmail.com',
                'password' => bcrypt('12345678'),
                'address' => 'Tầng 10, Tòa nhà An Phú số 24 Hoàng Quốc Việt, phường Nghĩa Đô, Quận Cầu Giấy, Hà Nội ',
                'role' => 1,
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 4,
                'name' => 'User2',
                'phone' => '02437347944',
                'email' => 'user2@gmail.com',
                'password' => bcrypt('12345678'),
                'address' => 'Tầng 1, tòa Sen Xanh, 36 Trịnh Đình Thảo, phường Hòa Thạnh, Quận Tân Phú, TPHCM',
                'role' => 1,
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 5,
                'name' => 'User3',
                'phone' => '02437347945',
                'email' => 'user3@gmail.com',
                'password' => bcrypt('12345678'),
                'address' => 'Tầng 1, tòa Sen Xanh, 36 Trịnh Đình Thảo, phường Hòa Thạnh, Quận Tân Phú, TPHCM',
                'role' => 1,
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 6,
                'name' => 'User4',
                'phone' => '02437347946',
                'email' => 'user4@gmail.com',
                'password' => bcrypt('12345678'),
                'address' => 'Tầng 1, tòa Sen Xanh, 36 Trịnh Đình Thảo, phường Hòa Thạnh, Quận Tân Phú, TPHCM',
                'role' => 1,
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 7,
                'name' => 'User5',
                'phone' => '02437347947',
                'email' => 'user5@gmail.com',
                'password' => bcrypt('12345678'),
                'address' => 'Tầng 1, tòa Sen Xanh, 36 Trịnh Đình Thảo, phường Hòa Thạnh, Quận Tân Phú, TPHCM',
                'role' => 1,
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 8,
                'name' => 'User6',
                'phone' => '02437347948',
                'email' => 'user6@gmail.com',
                'password' => bcrypt('12345678'),
                'address' => 'Tầng 1, tòa Sen Xanh, 36 Trịnh Đình Thảo, phường Hòa Thạnh, Quận Tân Phú, TPHCM',
                'role' => 1,
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 9,
                'name' => 'PHP',
                'phone' => '02437347949',
                'email' => 'php@gmail.com',
                'password' => bcrypt('12345678'),
                'address' => 'Tầng 1, tòa Sen Xanh, 36 Trịnh Đình Thảo, phường Hòa Thạnh, Quận Tân Phú, TPHCM',
                'role' => 1,
                'created_at' => Carbon::now(),
            ],
        ]);
    }
}
