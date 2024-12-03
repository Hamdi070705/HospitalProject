<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedicinesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('medicines')->insert([
            [
                'id' => 1, // explicitly set ID
                'kode_obat' => 'MED001',
                'nama_obat' => 'Paracetamol',
                'deskripsi' => 'Obat untuk menurunkan demam dan meredakan nyeri',
                'tipe_obat' => 'biasa',
                'stok' => 100,
                'gambar_obat' => 'images/paracetamol.png',
                'expiry_date' => '2024-12-31',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'kode_obat' => 'MED002',
                'nama_obat' => 'Amoxicillin',
                'deskripsi' => 'Antibiotik untuk mengobati infeksi bakteri',
                'tipe_obat' => 'keras',
                'stok' => 50,
                'gambar_obat' => 'images/amoxicillin.png',
                'expiry_date' => '2024-06-30',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'kode_obat' => 'MED003',
                'nama_obat' => 'Ibuprofen',
                'deskripsi' => 'Anti-inflammatory medication',
                'tipe_obat' => 'biasa',
                'stok' => 15, // Low stock
                'gambar_obat' => 'images/ibuprofen.png',
                'expiry_date' => '2024-03-15',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'kode_obat' => 'MED004',
                'nama_obat' => 'Omeprazole',
                'deskripsi' => 'Stomach acid reducer',
                'tipe_obat' => 'biasa',
                'stok' => 10, // Low stock
                'gambar_obat' => 'images/omeprazole.png',
                'expiry_date' => '2024-09-20',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}