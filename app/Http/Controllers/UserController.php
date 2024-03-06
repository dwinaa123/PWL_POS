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
       $user =UserModel::findOr(20, ['username', 'nama'], function (){
        abort(404);
       });
        
       
       return view('user', ['data' => $user]);
    }
}
