<?php

namespace App\Http\Controllers;

use App\DataTables\KategoriDataTable;
use App\Models\KategoriModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StorePostRequest;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\RedirectResponse;

class KategoriController extends Controller
{
    //public function index()
    //{
        //$data = [
           // 'kategori_kode' => 'SNK',
            //'nama' => 'Snack/Makanan Ringan',
           // 'created_at' => now()
        //];
       // DB::table('m_kategori')->insert($data);
       // return 'insert data baru berhasil';

      // $row = DB::table('m_kategori')->where('kategori_kode', 'SNK')->update(['nama' => 'camilan']);
       //return 'Update data berhasil. Jumlah data yang diupdate: ' . $row.' baris';

       //$data = DB::table('m_kategori')->get();
       //return view('kategori', ['data' => $data]);

//}
//public function index(KategoriDataTable $dataTable)
//{
    //return$dataTable->render('kategori.index');

//}

    public function index()
    {
        // Menampilkan halaman awal kategori
        $breadcrumb = (object) [
            'title' => 'Daftar Kategori',
            'list' => ['Home', 'Kategori']
        ];

        $page = (object) [
            'title' => 'Daftar Kategori yang terdaftar dalam sistem'
        ];

        $activeMenu = 'kategori'; //set menu yang aktif
        $kategori = KategoriModel::all();

        return view('kategori.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'kategori' => $kategori, 'activeMenu' => $activeMenu]);
    }

    // Ambil data kategori dalam bentuk json untuk datatables
    public function list(Request $request)
    {
        $kategoris = KategoriModel::select('kategori_id', 'kategori_kode', 'nama');

        //Filter data user berdasarkan level_id
        if ($request->kategori_id) {
            $kategoris->where('kategori_id', $request->kategori_id);
        }

        return DataTables::of($kategoris)
            ->addIndexColumn() // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
            ->addColumn('aksi', function ($kategori) {
                $btn = '<a href="'.url('/kategori/' . $kategori->kategori_id).'" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="'.url('/kategori/' . $kategori->kategori_id . '/edit').'" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="'. url('/kategori/'.$kategori->kategori_id).'">'.
                            csrf_field() . method_field('DELETE') .
                            '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }
public function create() 
{
    $breadcrumb = (object) [
        'title' => 'Tambah Kategori',
        'list' => ['Home', 'Kategori', 'Tambah']
    ];

    $page = (object) [
        'title' => 'Tambah Kategori Baru'
    ];

    $activeMenu = 'kategori'; //set menu yang aktif

    return view('kategori.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu]); 

}
public function store(Request $request)
{
    // Validasi input
    $request->validate([
        'kodeKategori' => 'required|string|min:6|max:10|unique:m_kategori,kategori_kode',
        'namaKategori' => 'required|string|max:100'
    ]);

    // Simpan kategori baru
    KategoriModel::create([
        'kategori_kode' => $request->input('kodeKategori'),
        'nama' => $request->input('namaKategori')
    ]);

    // Redirect dengan pesan sukses
    return redirect('/kategori')->with('success', 'Data kategori berhasil ditambahkan');
}


// Menampilkan detail kategori
public function show($id)
{
    $kategori = KategoriModel::find($id);

    $breadcrumb = (object) [
        'title' => 'Detail Kategori',
        'list' => ['Home', 'Kategori', 'Detail']
    ];

    $page = (object) [
        'title' => 'Detail Kategori'
    ];

    $activeMenu = 'kategori'; //set menu yang aktif

    return view('kategori.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu, 'kategori' => $kategori]);
}

// Menampilkan halaman form edit kategori
public function edit($id)
{
    $kategori = KategoriModel::find($id);

    if (!$kategori) {
        // Jika kategori tidak ditemukan, redirect dengan pesan kesalahan
        return redirect('/kategori')->with('error', 'Data kategori tidak ditemukan');
    }

    $breadcrumb = (object) [
        'title' => 'Edit Kategori',
        'list' => ['Home', 'Kategori', 'Edit']
    ];

    $page = (object) [
        'title' => 'Edit Kategori'
    ];

    $activeMenu = 'kategori'; //set menu yang aktif
    

    return view('kategori.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'kategori' => $kategori, 'activeMenu' => $activeMenu, ]);
}

// Menyimpan data kategori yang telah diedit
public function update(Request $request, $id)
{
    $request->validate([
        'kodeKategori' => 'required|string|min:6|max:10|unique:m_kategori,kategori_kode,' . $id . ',kategori_id',
        'namaKategori' => 'required|string|max:100'
    ]);

    $kategori = KategoriModel::find($id);
    if ($kategori) {
        $kategori->update([
            'kategori_kode' => $request->input('kodeKategori'),
            'nama' => $request->input('namaKategori')
        ]);
        return redirect('/kategori')->with('success', 'Data kategori berhasil diubah');
    } else {
        return redirect('/kategori')->with('error', 'Data kategori tidak ditemukan');
    }
}


// Menghapus data kategori
public function destroy($id)
{
    $check = KategoriModel::find($id);
    if (!$check) {
        return redirect('/kategori')->with('error', 'Data kategori tidak ditemukan');
    }
    
    try {
        KategoriModel::destroy($id);
        return redirect('/kategori')->with('success', 'Data kategori berhasil dihapus');
    } catch (\Illuminate\Database\QueryException $e) {
        return redirect('/kategori')->with('error', 'Data kategori gagal dihapus');
    }
}


//public function update($id, Request $request)
//{
    //$kategori = KategoriModel::find($id);
    //return view('kategori.kategori_update', ['data' => $kategori]);
//}


//public function update_simpan($id, Request $request)
//{
    //$kategori = KategoriModel::find($id);
    //$kategori->kategori_kode = $request->kodeKategori; // Ubah dari 'kodekategori' menjadi 'kodeKategori'
    //$kategori->nama = $request->namaKategori;

    //$kategori->save();

    //return redirect('/kategori');
//}
//public function delete($id)
//{
    //KategoriModel::destroy($id);
    //return redirect('/kategori');
//}




}
