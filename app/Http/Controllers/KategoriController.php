<?php

namespace App\Http\Controllers;
use App\Models\KategoriModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\DataTables\KategoriDataTable;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use Illuminate\view\view;

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
public function index(KategoriDataTable $dataTable)
{
    return$dataTable->render('kategori.index');

}
public function create(): view
{
    return view('kategori.create');

}
public function store(Request $request): RedirectResponse
{
    //validasi input
    $request->validate([
        'kodekategori' => 'bail|required|string|max:255',
        'nama' => 'bail|required|string|max:255',
    ]);

    //kategori
    KategoriModel::create([
        'kategori_kode' => $request->kodeKategori,
        'nama' => $request->namaKategori,
    ]);
    return redirect('/kategori');

}
public function update($id, Request $request)
{
    $kategori = KategoriModel::find($id);
    return view('kategori.kategori_update', ['data' => $kategori]);
}


public function update_simpan($id, Request $request)
{
    $kategori = KategoriModel::find($id);
    $kategori->kategori_kode = $request->kodeKategori; // Ubah dari 'kodekategori' menjadi 'kodeKategori'
    $kategori->nama = $request->namaKategori;

    $kategori->save();

    return redirect('/kategori');
}
public function delete($id)
{
    KategoriModel::destroy($id);
    return redirect('/kategori');
}




}
