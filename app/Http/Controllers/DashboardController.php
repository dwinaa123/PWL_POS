<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Level;
use App\Models\kategori;
use App\Models\Barang;
use App\Models\Stok;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Models\KategoriModel;
use App\Models\UserModel;
use App\Models\LevelModel;
use App\Models\BarangModel;
use App\Models\StokModel;
use App\Models\TransaksiModel;

class DashboardController extends Controller
{
    
    public function index()
{
    $breadcrumb = (object) [
        'title' => 'Halaman Utama',
        'list' => ['Home', 'Dashboard'],
    ];
    // Inisialisasi $activeMenu dengan nilai yang sesuai
    $activeMenu = 'dashboard'; // Sesuaikan nilai ini berdasarkan halaman saat ini

    // Mengambil data yang diperlukan untuk tampilan
    $level = LevelModel::all();
    $users = User::all();
    $kategori = KategoriModel::all();
    $barang = BarangModel::all();
    $stok = StokModel::all();
    $transaksi = TransaksiModel::all();

    // Mengembalikan tampilan dengan variabel yang dibutuhkan
    return view('dashboard', [
        'breadcrumb' => $breadcrumb,
        'levels' => $level,
        'users' => $users,
        'kategori' => $kategori,
        'barang' => $barang,
        'stok' => $stok,
        'transaksi' => $transaksi,
        'activeMenu' => $activeMenu // Mengirim $activeMenu ke tampilan
        
    ]);
}


}
