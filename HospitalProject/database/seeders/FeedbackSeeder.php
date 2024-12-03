<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeedbackSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('feedback')->insert([
            [
                'patient_id' => 4,
                'komentar' => 'Pelayanan sangat baik dan dokter sangat ramah',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
