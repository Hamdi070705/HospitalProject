<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiagnosisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('diagnosis')->insert([
            [
                'id' => 1, // explicitly set ID
                'diagnosis_code' => 'D001',
                'diagnosis_date' => now(),
                'id_obat' => 1, // this should match medicine id
                'riwayat_penyakit' => 'Demam',
                'tindakan_medis' => 'Pemberian obat penurun demam',
                'description' => 'Pasien mengalami demam ringan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'diagnosis_code' => 'D002',
                'diagnosis_date' => now(),
                'id_obat' => 2,
                'riwayat_penyakit' => 'Infeksi Saluran Pernafasan',
                'tindakan_medis' => 'Pemberian antibiotik',
                'description' => 'Pasien mengalami batuk dan flu',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
