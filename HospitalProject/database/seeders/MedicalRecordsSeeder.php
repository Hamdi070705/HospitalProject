<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedicalRecordsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('medical_records')->insert([
            [
                'id_diagnosis' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
