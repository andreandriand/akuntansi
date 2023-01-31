<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@mail.com',
                'email_verified_at' => now(),
                'password' => bcrypt('admin'),
            ],
            [
                'name' => 'Admin 2',
                'email' => 'admin2@mail.com',
                'email_verified_at' => now(),
                'password' => bcrypt('admin2'),
            ],
        ];

        User::insert($users);
    }
}
