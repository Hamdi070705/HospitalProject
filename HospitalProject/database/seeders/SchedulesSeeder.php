<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchedulesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('schedules')->insert([
            [
                'id' => 1,
                'hari' => 'Senin',
            ],
            [
                'id' => 2,
                'hari' => 'Selasa',
            ],
            [
                'id' => 3,
                'hari' => 'Rabu',
            ],
            [
                'id' => 4,
                'hari' => 'Kamis',
            ],
            [
                'id' => 5,
                'hari' => 'Jumat',
            ],
            [
                'id' => 6,
                'hari' => 'Sabtu',
            ],
            [
                'id' => 7,
                'hari' => 'Minggu',
            ],
        ]);
    }
}
