<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => '$2y$10$E44UqfAOx8epS0SN2Y3ZvuqXUqRih9xW7UzcDiqzfmOJ5djih9Vq2',
                'remember_token' => null,
                'created_at'     => '2021-08-11 07:11:07',
                'updated_at'     => '2021-08-11 07:11:07',
            ],

            [
                'id'             => 2,
                'name'           => 'User',
                'email'          => 'user@user.com',
                'password'       => '$2y$10$E44UqfAOx8epS0SN2Y3ZvuqXUqRih9xW7UzcDiqzfmOJ5djih9Vq2',
                'remember_token' => null,
                'created_at'     => '2021-08-11 07:11:07',
                'updated_at'     => '2021-08-11 07:11:07',
            ],
        ];

        User::insert($users);
    }
}
