<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
                'id' => 1,
                'first_name' => 'John',
                'last_name' => 'Doe',
                'phone' => '123',
                'email' => 'test@example.com',
                'password' => app('hash')->make('123')
            ],
            [
                'id' => 2,
                'first_name' => 'Stephan',
                'last_name' => 'Doe',
                'phone' => '1234',
                'email' => 'test1@example.com',
                'password' => app('hash')->make('321')
            ],
        ];
        DB::table('users')->insert($users);
    }
}
