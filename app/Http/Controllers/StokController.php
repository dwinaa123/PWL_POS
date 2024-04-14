<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\StokModel;
use App\Models\BarangModel;
use App\Models\UserModel;


class StokController extends Controller
{
    public function index() {
        // Menampilkan halaman awal stok
        $breadcrumb = (object) [
            'title' => 'Daftar Stok',
            'list' => ['Home', 'Stok']
        ];

        $page = (object) [
            'title' => 'Daftar Stok yang terdaftar dalam sistem'
        ];

        $activeMenu = 'stok'; // set menu yang aktif

        $user = UserModel::all(); // ambil data user untuk filter user

        return view('stok.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu, 'user' => $user]);
    }

    // Ambil data stok dalam bentuk JSON untuk datatables
    public function list(Request $request)
    {
        $stoks = StokModel::select('stok_id', 'barang_id', 'user_id', 'stok_tanggal', 'stok_jumlah')
            ->with('barang')->with('user');

        // Filter data stok berdasarkan user_id
        if ($request->user_id) {
            $stoks->where('user_id', $request->user_id);
        }

        return DataTables::of($stoks)
            ->addIndexColumn() // menambahkan kolom index/no urut (default nama kolom: DT_RowIndex)
            ->addColumn('aksi', function ($stok) {
                $btn = '<a href="'.url('/stok/' . $stok->stok_id).'" class="btn btn-info btn-sm">Detail</a>';
                $btn .= '<a href="'.url('/stok/' . $stok->stok_id . '/edit').'" class="btn btn-warning btn-sm">Edit</a>';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/stok/' . $stok->stok_id) . '">'
                        . csrf_field() . method_field('DELETE') 
                        . '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin ingin menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    // Menampilkan halaman form tambah stok
    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Stok',
            'list' => ['Home', 'Stok', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah Stok'
        ];

        $activeMenu = 'stok'; // set menu yang aktif

        $barang = BarangModel::all(); // data barang
        $user = UserModel::all(); // data pengguna

        return view('stok.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu, 'barang' => $barang, 'user' => $user]);
    }

    // Menyimpan data stok baru
    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'barang_id' => 'required|integer',
            'user_id' => 'required|integer',
            'stok_tanggal' => 'required|date',
            'stok_jumlah' => 'required|integer',
        ]);

        // Simpan data stok baru
        StokModel::create($request->all());

        // Redirect kembali ke halaman stok dengan pesan sukses
        return redirect('/stok')->with('status', 'Data stok berhasil ditambahkan!');
    }

    // Menampilkan detail stok
    public function show($id)
{
    $stok = StokModel::with(['barang', 'user'])->find($id);

    if (!$stok) {
        return redirect('/stok')->with('error', 'Data stok tidak ditemukan!');
    }

    $breadcrumb = (object) [
        'title' => 'Detail Stok',
        'list' => ['Home', 'Stok', 'Detail']
    ];

    $page = (object) [
        'title' => 'Detail Stok'
    ];

    $activeMenu = 'stok'; // Set menu yang aktif

    return view('stok.show', [
        'breadcrumb' => $breadcrumb,
        'page' => $page,
        'activeMenu' => $activeMenu,
        'stok' => $stok,
    ]);
}

    // Menampilkan halaman form edit stok
    public function edit($id)
    {
        $stok = StokModel::find($id);
        $breadcrumb = (object) [
            'title' => 'Edit Stok',
            'list' => ['Home', 'Stok', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit Stok'
        ];

        $activeMenu = 'stok'; // set menu yang aktif
        $barang = BarangModel::all(); // data barang
        $user = UserModel::all(); // data pengguna

        return view('stok.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu, 'stok' => $stok, 'barang' => $barang, 'user' => $user]);
    }

    // Menyimpan perubahan data stok yang diedit
    public function update(Request $request, $id)
{
    $request->validate([
        'barang_id' => 'required|integer',
        'user_id' => 'required|integer',
        'stok_tanggal' => 'required|date',
        'stok_jumlah' => 'required|integer',
    ]);

    // Ambil stok berdasarkan ID
    $stok = StokModel::findOrFail($id);
$stok->barang_id = $request->input('barang_id');
$stok->user_id = $request->input('user_id');
$stok->stok_tanggal = $request->input('stok_tanggal');
$stok->stok_jumlah = $request->input('stok_jumlah');
try{
    // Simpan perubahan
    $stok->save();

    // Redirect ke halaman stok
    return redirect('/stok')->with('success', 'Stok berhasil diperbarui');
}catch (\Exception $e){
    return redirect('/stok')->with('error', 'Terjadi kesalahan saat memperbarui stok: ' . $e->getMessage());
}
    
}


    // Menghapus data stok
    public function destroy($id)
    {
        $stok = StokModel::find($id);
        if (!$stok) {
            return redirect('/stok')->with('error', 'Data stok tidak ditemukan!');
        }

        try {
            StokModel::destroy($id);
            return redirect('/stok')->with('success', 'Data stok berhasil dihapus!');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/stok')->with('error', 'Data stok gagal dihapus! ' . $e->getMessage());
        }
    }
}
