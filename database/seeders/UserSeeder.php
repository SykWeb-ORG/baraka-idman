<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                [
                    'first_name' => 'admin',
                    'last_name' => 'admin',
                    'cin' => 'ee000000',
                    'phone_number' => '+212600000000',
                    'birthday_date' => '2000/01/01',
                    'email' => 'admin@gmail.com',
                    'password' => Hash::make('demo0000'),
                ],
                [
                    'first_name' => 'intervenant',
                    'last_name' => 'intervenant',
                    'cin' => 'ee000000',
                    'phone_number' => '+212600000000',
                    'birthday_date' => '2000/01/01',
                    'email' => 'intervenant@gmail.com',
                    'password' => Hash::make('demo0000'),
                ],
                [
                    'first_name' => 'medical',
                    'last_name' => 'medical',
                    'cin' => 'ee000000',
                    'phone_number' => '+212600000000',
                    'birthday_date' => '2000/01/01',
                    'email' => 'medical@gmail.com',
                    'password' => Hash::make('demo0000'),
                ],
                [
                    'first_name' => 'social',
                    'last_name' => 'social',
                    'cin' => 'ee000000',
                    'phone_number' => '+212600000000',
                    'birthday_date' => '2000/01/01',
                    'email' => 'social@gmail.com',
                    'password' => Hash::make('demo0000'),
                ],
            ]
        );
    }
}
