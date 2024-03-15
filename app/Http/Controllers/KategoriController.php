<?php

namespace App\Http\Controllers;
use App\Models\KategoriModel;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;
use App\DataTables\KategoriDataTable;

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
public function create()
{
    return view('kategori.create');

}
public function store(Request $request)
{
    KategoriModel::create([
        'kategori_kode' => $request->kodeKategori,
        'nama' => $request->namaKategori,
    ]);
    return redirect('/kategori');

}
}
