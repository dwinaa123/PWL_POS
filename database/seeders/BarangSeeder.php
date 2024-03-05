<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data =[
            [
                'kategori_id' => 1,
                'barang_kode' => 'A001',
                'barang_nama' => 'Kalung',
                'harga_beli' => '150000',
                'harga_jual' => '175000',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_id' => 1,
                'barang_kode' => 'A002',
                'barang_nama' => 'Anting',
                'harga_beli' => '100000',
                'harga_jual' => '125000',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
            [
                'kategori_id' => 2,
                'barang_kode' => 'M001',
                'barang_nama' => 'Amplang',
                'harga_beli' => '80000',
                'harga_jual' => '100000',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_id' => 2,
                'barang_kode' => 'M002',
                'barang_nama' => 'Kelepon',
                'harga_beli' => '10000',
                'harga_jual' => '15000',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_id' => 3,
                'barang_kode' => 'P001',
                'barang_nama' => 'Kemeja',
                'harga_beli' => '50000',
                'harga_jual' => '65000',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_id' => 3,
                'barang_kode' => 'P002',
                'barang_nama' => 'Rok',
                'harga_beli' => '75000',
                'harga_jual' => '90000',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_id' => 4,
                'barang_kode' => 'K001',
                'barang_nama' => 'Lipstik',
                'harga_beli' => '30000',
                'harga_jual' => '45000',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_id' => 4,
                'barang_kode' => 'K002',
                'barang_nama' => 'Maskara',
                'harga_beli' => '80000',
                'harga_jual' => '100000',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_id' => 5,
                'barang_kode' => 'O001',
                'barang_nama' => 'Sepatu',
                'harga_beli' => '250000',
                'harga_jual' => '175000',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_id' => 5,
                'barang_kode' => 'O002',
                'barang_nama' => 'Bola',
                'harga_beli' => '50000',
                'harga_jual' => '50000',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        DB::table('m_barang')->insert($data);
    }
}
