<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Penjualan_DetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();

        $data = [
            [
                'detail_id' => 1,
                'penjualan_id' => 21,
                'barang_id' => 1,
                'harga' => 700000,
                'jumlah' => 5
            ],
            [
                'detail_id' => 2,
                'penjualan_id' => 22,
                'barang_id' => 2,
                'harga' => 1500000,
                'jumlah' => 5
            ],
            [
                'detail_id' => 3,
                'penjualan_id' => 23,
                'barang_id' => 3,
                'harga' => 500000,
                'jumlah' => 5
            ],
            [
                'detail_id' => 4,
                'penjualan_id' => 24,
                'barang_id' => 4,
                'harga' => 700000,
                'jumlah' => 5
            ],
            [
                'detail_id' => 5,
                'penjualan_id' => 25,
                'barang_id' => 5,
                'harga' => 500000,
                'jumlah' => 5
            ],
            [
                'detail_id' => 6,
                'penjualan_id' => 26,
                'barang_id' => 6,
                'harga' => 600000,
                'jumlah' => 5
            ],
            [
                'detail_id' => 7,
                'penjualan_id' => 27,
                'barang_id' => 7,
                'harga' => 700000,
                'jumlah' => 5
            ],
            [
                'detail_id' => 8,
                'penjualan_id' => 28,
                'barang_id' => 8,
                'harga' => 800000,
                'jumlah' => 5
            ],
            [
                'detail_id' => 9,
                'penjualan_id' => 29,
                'barang_id' => 9,
                'harga' => 900000,
                'jumlah' => 5
            ],
            [
                'detail_id' => 10,
                'penjualan_id' => 30,
                'barang_id' => 10,
                'harga' => 1000000,
                'jumlah' => 5
            ],
            [
                'detail_id' => 11,
                'penjualan_id' => 21,
                'barang_id' => 1,
                'harga' => 1100000,
                'jumlah' => 5
            ],
            [
                'detail_id' => 12,
                'penjualan_id' => 22,
                'barang_id' => 2,
                'harga' => 1200000,
                'jumlah' => 5
            ],
            [
                'detail_id' => 13,
                'penjualan_id' => 23,
                'barang_id' => 3,
                'harga' => 1300000,
                'jumlah' => 5
            ],
            [
                'detail_id' => 14,
                'penjualan_id' => 24,
                'barang_id' => 4,
                'harga' => 1400000,
                'jumlah' => 5
            ],
            [
                'detail_id' => 15,
                'penjualan_id' => 25,
                'barang_id' => 5,
                'harga' => 1500000,
                'jumlah' => 5
            ],
            [
                'detail_id' => 16,
                'penjualan_id' => 26,
                'barang_id' => 6,
                'harga' => 1500000,
                'jumlah' => 5
            ],
            [
                'detail_id' => 17,
                'penjualan_id' => 27,
                'barang_id' => 7,
                'harga' => 1700000,
                'jumlah' => 5
            ],
            [
                'detail_id' => 18,
                'penjualan_id' => 28,
                'barang_id' => 8,
                'harga' => 1800000,
                'jumlah' => 5
            ],
            [
                'detail_id' => 19,
                'penjualan_id' => 29,
                'barang_id' => 9,
                'harga' => 1900000,
                'jumlah' => 5
            ],
            [
                'detail_id' => 20,
                'penjualan_id' => 30,
                'barang_id' => 10,
                'harga' => 2000000,
                'jumlah' => 5
            ],
            [
                'detail_id' => 21,
                'penjualan_id' => 21,
                'barang_id' => 1,
                'harga' => 2100000,
                'jumlah' => 5
            ],
            [
                'detail_id' => 22,
                'penjualan_id' => 22,
                'barang_id' => 2,
                'harga' => 2200000,
                'jumlah' => 5
            ],
            [
                'detail_id' => 23,
                'penjualan_id' => 23,
                'barang_id' => 3,
                'harga' => 2300000,
                'jumlah' => 5
            ],
            [
                'detail_id' => 24,
                'penjualan_id' => 24,
                'barang_id' => 4,
                'harga' => 2400000,
                'jumlah' => 5
            ],
            [
                'detail_id' => 25,
                'penjualan_id' => 25,
                'barang_id' => 5,
                'harga' => 2500000,
                'jumlah' => 5
            ],
            [
                'detail_id' => 26,
                'penjualan_id' => 26,
                'barang_id' => 6,
                'harga' => 2600000,
                'jumlah' => 5
            ],
            [
                'detail_id' => 27,
                'penjualan_id' => 27,
                'barang_id' => 7,
                'harga' => 2700000,
                'jumlah' => 5
            ],
            [
                'detail_id' => 28,
                'penjualan_id' => 28,
                'barang_id' => 8,
                'harga' => 2800000,
                'jumlah' => 5
            ],
            [
                'detail_id' => 29,
                'penjualan_id' => 29,
                'barang_id' => 9,
                'harga' => 2900000,
                'jumlah' => 5
            ],
            [
                'detail_id' => 30,
                'penjualan_id' => 30,
                'barang_id' => 10,
                'harga' => 3000000,
                'jumlah' => 5
            ]
        ];

        DB::table('t_penjualan_detail')->insert($data);
    }
}
