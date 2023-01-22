<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cas')->insert(
            [
                [
                    'cas_nom' => 'pas de CIN',
                ],
                [
                    'cas_nom' => 'pas de certificat d\'avis',
                ],
                [
                    'cas_nom' => 'cas 1',
                ],
                [
                    'cas_nom' => 'cas 2',
                ],
                [
                    'cas_nom' => 'cas 3',
                ],
            ]
        );
    }
}
