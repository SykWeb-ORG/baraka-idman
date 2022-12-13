<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('places')->insert(
            [
                [
                    'lieu' => 'ecole imam mouslim',
                    'programme_date' => '2022-12-20',
                    'programme_id' => 1,
                ],
                [
                    'lieu' => 'ecole ibno toumert',
                    'programme_date' => '2022-12-21',
                    'programme_id' => 1,
                ],
                [
                    'lieu' => 'quartier lamhamid',
                    'programme_date' => '2023-01-10',
                    'programme_id' => 2,
                ],
                [
                    'lieu' => 'quartier lmassira',
                    'programme_date' => '2023-01-15',
                    'programme_id' => 2,
                ],
                [
                    'lieu' => 'ecole laayoun',
                    'programme_date' => '2023-02-01',
                    'programme_id' => 3,
                ],
            ]
        );
    }
}
