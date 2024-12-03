<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DoctorSchedulesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('doctor_schedules')->insert([
            [
                'dokter_id' => 2,
                'schedule_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'dokter_id' => 2,
                'schedule_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'dokter_id' => 3,
                'schedule_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'dokter_id' => 3,
                'schedule_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
