<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //public function index()
    //{

        //$data =[
           // 'level_id' => 2,
           // 'username' => 'manager_tiga',
           // 'nama' => 'Manager 3',
           // 'password' => Hash::make('12345')
            //'username' => 'customer-1',
           //'nama' => 'pelanggan pertama',
            //'password' => Hash::make('12345'),
            //'level_id' => 4
       // ];
        //UserModel::insert($data);
        //UserModel::where('username', 'customer-1')->update($data);
        //UserModel::create($data);
        //$user = UserModel::all();
       // return view('user', ['data' => $user]);
       //$user =UserModel::where('level_id', 2)->count();
       //dd($user);
       //$user = UserModel::firstOrCreate([
    //'username' => 'manager22',
    //'nama' => 'Manager Dua Dua',
    //'password' => Hash::make('12345'),
   // 'level_id' => 2
   //$user = UserModel::firstOrNew(
//[
    //'username' => 'manager33',
   // 'nama' => 'Manager Tiga Tiga',
    //'password' => Hash::make('12345'),
    //'level_id' => 2
//]
//);
//$user->save();
    //   return view('user', ['data' => $user]);
   // $user = UserModel::Create([
        //'username' => 'manager13',
        //'nama' => 'Manager13',
        //'password' => Hash::make('12345'),
        //'level_id' => 2,
    //]);
    //$user->username = 'manager 13';

    //$user->save();


   // $user->wasChanged();//true
    //$user->wasChanged('username');//true
    //$user->wasChanged(['username', 'level_id']);//true
    //$user->wasChanged('nama');//false
   // dd($user->wasChanged(['nama', 'username']));//true
   //$user = UserModel::all();
    //return view('user', ['data' => $user]);
    //}
    public function tambah()
    {
       return view('user_tambah');
    }

    public function tambah_simpan (Request $request)
    {

        UserModel::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => Hash::make($request->password),
            'level_id' => $request->level_id
        ]);
       return redirect('/user');
    }

    public function ubah ($id)
    {

        $user = UserModel::find($id);
       return view('user_ubah', ['data' => $user]);
    }

    public function ubah_simpan ($id, Request $request)
    {

        $user = UserModel::find($id);

        $user->username = $request->username;
        $user->nama = $request->nama;
       
        $user->level_id = $request->level_id;

        $user->save();
       return redirect('/user');
    }

    public function hapus ($id)
    {

        $user = UserModel::find($id);

        $user->delete();
       return redirect('/user');
    }

    public function index ()
    {

        $user = UserModel::with('level')->get();
        dd($user);
    }
}
