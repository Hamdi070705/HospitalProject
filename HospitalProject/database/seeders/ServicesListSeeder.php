<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicesListSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('services_list')->insert([
            [
                'id' => 1, // Explicitly set ID
                'nama_layanan' => 'Konsultasi Umum',
                'id_dokter' => 2,  // Make sure this doctor exists in users table
                'deskripsi' => 'Konsultasi kesehatan umum',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
