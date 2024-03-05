<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kategori_kode' => 'K001',
                'nama' => 'Aksesoris',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_kode' => 'K002',
                'nama' => 'Makanan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_kode' => 'K003',
                'nama' => 'Pakaian',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_kode' => 'K004',
                'nama' => 'Kecantikan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_kode' => 'K005',
                'nama' => 'Olahraga',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('m_kategori')->insert($data);
    }
}
