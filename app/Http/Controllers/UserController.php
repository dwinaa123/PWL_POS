<?php

namespace App\Http\Controllers;

use App\DataTables\UserDataTable;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(UserDataTable $dataTable)
    {
      return $dataTable->render('user.index');
    }  
    public function create(){
    return view('user.create');
}
                public function store(Request $request)
            
        {
    
    
        
        
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
    //public function tambah()
    //{
      // return view('user_tambah');
    //}

    //public function tambah_simpan (Request $request)
    //{
        $request->validate([
            'username' =>'required' ,
            'nama' => 'required',
            'password' =>'required' ,
            'level_id' =>'required', 
        ]);
        $data = $request->only(['username', 'nama', 'password', 'level_id']);
        //$request->$request->except(['username', 'nama', 'password', 'level_id']);

        UserModel::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => Hash::make($request->password),
            'level_id' => $request->level_id
        ]);
       return redirect('user');
    }

    public function edit ($id)
    {

        $user = UserModel::find($id);
       return view('user.edit', ['data' => $user]);
    }

    public function edit_simpan ($id, Request $request)
    {

    $user = UserModel::find($id);

    $user->username = $request->username;
    $user->nama = $request->nama;
       
    $user->level_id = $request->level_id;

    $user->save();
    return redirect('/user');
    }

    public function delete ($id)
    {

    $user = UserModel::find($id);
    $user->delete();
    return redirect('/user');
    }

    //public function index ()
    //{

       // $user = UserModel::with('level')->get();
        //dd($user);
        //return view('user', ['data' =$user]);
    //}
}
