<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = [
            [
                'title' => 'First Company',
                'phone' => '123',
                'description' => Str::random(50),
                'user_id' => 1
            ],
            [
                'title' => 'Second Company',
                'phone' => '1234',
                'description' => Str::random(50),
                'user_id' => 1
            ],
            [
                'title' => 'Third Company',
                'phone' => '1235',
                'description' => Str::random(50),
                'user_id' => 2
            ],
        ];

        DB::table('companies')->insert($companies);
    }
}
