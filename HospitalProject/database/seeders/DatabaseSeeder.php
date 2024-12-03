<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // First run base seeders
        $this->call([
            UsersSeeder::class,
            MedicinesSeeder::class,
            SchedulesSeeder::class,    // Add this line
        ]);

        // Then run seeders that depend on base tables
        $this->call([
            ServicesListSeeder::class,    // needs users
            DiagnosisSeeder::class,       // needs medicines
            DoctorSchedulesSeeder::class,  // needs users and schedule
        ]);

        // Finally run seeders with multiple dependencies
        $this->call([
            ServicesGroupSeeder::class,    // needs services_list, users, diagnosis
            MedicalRecordsSeeder::class,   // needs diagnosis
            FeedbackSeeder::class,         // needs users
        ]);
    }
}
