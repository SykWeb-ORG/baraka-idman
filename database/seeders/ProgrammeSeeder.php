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
                    'programme_nom' => 'programme n n A',
                ],
                [
                    'programme_type' => 'programme B',
                    'programme_nom' => 'programme n B',
                ],
                [
                    'programme_type' => 'programme C',
                    'programme_nom' => 'programme n C',
                ],
                [
                    'programme_type' => 'programme D',
                    'programme_nom' => 'programme n D',
                ],
            ]
        );
    }
}
