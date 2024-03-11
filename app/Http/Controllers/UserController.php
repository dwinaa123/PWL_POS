<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
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
   $user = UserModel::firstOrNew(
[
    'username' => 'manager33',
    'nama' => 'Manager Tiga Tiga',
    'password' => Hash::make('12345'),
    'level_id' => 2
]
);
$user->save();
       return view('user', ['data' => $user]);
    }
}
