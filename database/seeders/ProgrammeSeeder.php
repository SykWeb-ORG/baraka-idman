<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgrammeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('programmes')->insert(
            [
                [
                    'programme_type' => 'programme A',
                ],
                [
                    'programme_type' => 'programme B',
                ],
                [
                    'programme_type' => 'programme C',
                ],
                [
                    'programme_type' => 'programme D',
                ],
            ]
        );
    }
}
