<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ZoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('zones')->insert(
            [
                [
                    'zone_nom' => 'bab dokala',
                ],
                [
                    'zone_nom' => 'gueliz',
                ],
                [
                    'zone_nom' => 'mallah',
                ],
                [
                    'zone_nom' => 'sidi youssef',
                ],
            ]
        );
    }
}
