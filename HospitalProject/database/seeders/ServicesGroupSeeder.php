<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ServicesGroupSeeder extends Seeder
{
    public function run(): void
    {
        $statuses = ['pending', 'completed', 'cancelled', 'approved'];
        $users = [4, 5, 6];
        $diagnosisIds = [1, 2];

        // Create appointments for current week (for weekly status)
        for ($i = 0; $i < 30; $i++) {
            $randomDate = Carbon::now()->startOfWeek()->addDays(rand(0, 6));

            DB::table('services_group')->insert([
                'id_services' => 1,
                'id_user' => $users[array_rand($users)],
                'id_diagnosis' => $diagnosisIds[array_rand($diagnosisIds)],
                'status' => $statuses[array_rand($statuses)],
                'tanggal_periksa' => $randomDate,
                'created_at' => $randomDate,
                'updated_at' => now(),
            ]);
        }

        // Create appointments for past months (for monthly chart)
        for ($month = 1; $month <= 12; $month++) {
            $appointmentsCount = rand(5, 20); // Random number of appointments per month

            for ($i = 0; $i < $appointmentsCount; $i++) {
                $randomDate = Carbon::create(date('Y'), $month, rand(1, 28));

                DB::table('services_group')->insert([
                    'id_services' => 1,
                    'id_user' => $users[array_rand($users)],
                    'id_diagnosis' => $diagnosisIds[array_rand($diagnosisIds)],
                    'status' => $statuses[array_rand($statuses)],
                    'tanggal_periksa' => $randomDate,
                    'created_at' => $randomDate,
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
