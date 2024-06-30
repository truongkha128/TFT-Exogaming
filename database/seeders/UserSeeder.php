<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'email'    => 'admin@gmail.vn',
                'name'     => 'Admin',
                'password' => bcrypt('123@admin'),
                'role_id'     => 1,
            ],
            [
                'email'    => 'exogaming@gmail.vn',
                'name'     => 'Admin',
                'password' => bcrypt('123@admin'),
                'role_id'     => 1,
            ],
        ];

        foreach ($data as $item) {
            if (!User::where(['email'=>$item['email']])->exists()) {
                User::Create($item);
            }
        }
    }
}
