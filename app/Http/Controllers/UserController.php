<?php

namespace App\Http\Controllers;
use Yajra\DataTables\Facades\DataTables;
use App\DataTables\UserDataTable;
use App\Http\Requests\StorePostRequest;
use App\Models\LevelModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //public function index(UserDataTable $dataTable)
    //{
     // return $dataTable->render('user.index');
    //}  
    //public function create(){
    //return view('user.create');

    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Daftar User',
            'list' => ['Home', 'User']
        ];

        $page = (object)[
            'title' => 'Daftar user yang terdaftar dalam sistem'
        ];
   
        $activeMenu = 'user';
        $level = LevelModel::all();
        return view('user.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'level' => $level, 'activeMenu'=> $activeMenu]);
    }

    // Ambil data user dalam bentuk json untuk datatables
    public function list(Request $request)
    {
        $users = UserModel::select('level_id', 'username', 'nama', 'password', 'user_id')
                ->with('level');

        // Filter data user berdasarkan level_id
        //if ($request->level_id) {
            //$users->where('level_id', $request->level_id);
        //}

        return DataTables::of($users)
            ->addIndexColumn() // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
            ->addColumn('aksi', function ($user) { // menambahkan kolom aksi
                $btn = '<a href="'.url('/user/' . $user->user_id).'" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="'.url('/user/' . $user->user_id . '/edit').'" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .='<form class="d-inline-block" method="POST" action="'. url('/user/'.$user->user_id).'" onsubmit="return confirm(\'Apakah Anda yakin menghapus data ini?\');">'.
                csrf_field() . method_field('DELETE') .
                '<button type="submit" class="btn btn-danger btn-sm">Hapus</button></form>';
                
                return $btn;
            })
            ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah html
            ->make(true);
    
        }

      // Fungsi create
public function create() 
{
    $breadcrumb = (object)[
        'title' => 'Tambah User',
        'list' => ['Home', 'User', 'Tambah']
    ];

    $page = (object)[
        'title' => 'Tambah User Baru'
    ];

    $level = LevelModel::all(); // Ambil data level untuk ditampilkan di form
    $activeMenu = 'user'; // Set menu yang aktif

    return view('user.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'level' => $level, 'activeMenu' => $activeMenu]);
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
            'username' =>'required|string|min:3|unique:m_user,username' ,
            'nama' => 'required|string|max:100',
            'password' =>'required|min:5' ,
            'level_id' =>'required|integer', 
        ]);
        //$data = $request->only(['username', 'nama', 'password', 'level_id']);
        //$request->$request->except(['username', 'nama', 'password', 'level_id']);

        UserModel::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => Hash::make($request->password),
            'level_id' => $request->level_id
        ]);
       return redirect('/user')->with('success', 'Data user berhasil disimpan');
    }

    // Menampilkan detail user
public function show($id)
{
    $user = UserModel::find($id);
    $breadcrumb = (object) [
        'title' => 'Detail User',
        'list' => ['Home', 'User', 'Detail']
    ];

    $page = (object) [
        'title' => 'Detail User'
    ];

    $activeMenu = 'user'; //set menu yang aktif

    return view('user.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'user' => $user, 'activeMenu' => $activeMenu]);
}
    //edit

    public function edit (string $id)
    {

        $user = UserModel::find($id);
        $level = LevelModel::all();

        $breadcrumb = (object) [
            'title' => 'Edit User',
            'list' => ['Home', 'User', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit user'
        ];

        $activeMenu = 'user';
       return view('user.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'user' => $user, 'level' => $level, 'activeMenu' => $activeMenu]);
    }

    public function update(Request $request, $id)
{
    // Validasi input
    $request->validate([
        'username' => 'required|string|min:3|unique:m_user,username,' . $id . ',user_id',
        'nama' => 'required|string|max:100',
        'password' => 'nullable|min:5',
        'level_id' => 'required|integer'
    ]);

    // Temukan user berdasarkan ID
    UserModel::find($id)->update([

            'username' => $request->username,
            'nama' => $request->nama,
            'password' => $request->password ? bcrypt($request->password) : UserModel::find($id)->password,
            'level_id' => $request->level_id
        ]);

        // Redirect dengan pesan sukses
        return redirect('/user')->with('success', 'Data user berhasil diubah');
}

    //public function edit_simpan ($id, Request $request)
   // {

    //$user = UserModel::find($id);

    //$user->username = $request->username;
    //$user->nama = $request->nama;
       
    //$user->level_id = $request->level_id;

    //$user->save();
    //return redirect('/user');
    //}


    //public function delete ($id)
    //{

    //$user = UserModel::find($id);
    //$user->delete();
    //return redirect('/user');
    //}

    //public function index ()
    //{

       // $user = UserModel::with('level')->get();
        //dd($user);
        //return view('user', ['data' =$user]);
    //}

    // Menghapus data user
public function destroy(string $id)
{
    // Temukan pengguna berdasarkan ID
    $check = UserModel::find($id);
    
    // Pengecekan apakah pengguna dengan ID yang dimaksud ada atau tidak
    if (!$check) {
        return redirect('/user')->with('error', 'Data user tidak ditemukan');
    }
    
    // Coba hapus data pengguna
    try {
        // Hapus pengguna berdasarkan ID
        UserModel::destroy($id);
        
        // Pengarahan ke halaman /user dengan pesan sukses
        return redirect('/user')->with('success', 'Data user berhasil dihapus');
    } catch (\Illuminate\Database\QueryException $e) {
        // Jika terjadi kesalahan ketika menghapus data pengguna
        
        // Pesan kesalahan yang jelas diberikan kepada pengguna
        return redirect('/user')->with('error', 'Data user gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini')
;
    }
}

}

