<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedicalAssistantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('medical_assistants')->insert(
            [
                [
                    'user_id' => 3,
                ],
            ]
        );
    }
}
