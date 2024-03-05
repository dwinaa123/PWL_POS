<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();

        $data = [
            ['penjualan_id' => 1, 'pembeli' => 'Dwina', 'penjualan_kode' => 'DW001', 'penjualan_tanggal' => '2024-02-01', 'created_at' => $now, 'updated_at' => $now],
            ['penjualan_id' => 2, 'pembeli' => 'Marina', 'penjualan_kode' => 'DW002', 'penjualan_tanggal' => '2024-02-02', 'created_at' => $now, 'updated_at' => $now],
            ['penjualan_id' => 3, 'pembeli' => 'Alvia', 'penjualan_kode' => 'DW003', 'penjualan_tanggal' => '2024-03-03', 'created_at' => $now, 'updated_at' => $now],
            ['penjualan_id' => 1, 'pembeli' => 'Maryani', 'penjualan_kode' => 'DW004', 'penjualan_tanggal' => '2024-03-04', 'created_at' => $now, 'updated_at' => $now],
            ['penjualan_id' => 2, 'pembeli' => 'Rendi', 'penjualan_kode' => 'DW005', 'penjualan_tanggal' => '2024-03-05', 'created_at' => $now, 'updated_at' => $now],
            ['penjualan_id' => 3, 'pembeli' => 'Puspa', 'penjualan_kode' => 'DW006', 'penjualan_tanggal' => '2024-03-06', 'created_at' => $now, 'updated_at' => $now],
            ['penjualan_id' => 1, 'pembeli' => 'Arif', 'penjualan_kode' => 'DW007', 'penjualan_tanggal' => '2024-03-07', 'created_at' => $now, 'updated_at' => $now],
            ['penjualan_id' => 2, 'pembeli' => 'Monika', 'penjualan_kode' => 'DW008', 'penjualan_tanggal' => '2024-03-08', 'created_at' => $now, 'updated_at' => $now],
            ['penjualan_id' => 3, 'pembeli' => 'Cici', 'penjualan_kode' => 'DW009', 'penjualan_tanggal' => '2024-03-09', 'created_at' => $now, 'updated_at' => $now],
            ['penjualan_id' => 1, 'pembeli' => 'Riski', 'penjualan_kode' => 'DW010', 'penjualan_tanggal' => '2024-03-10', 'created_at' => $now, 'updated_at' => $now],
        ];

        DB::table('t_penjualan')->insert($data);
    }
}
