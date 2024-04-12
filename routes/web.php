<?php

use App\Http\Controllers\LevelController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\POSController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/level', [LevelController::class, 'index'])->name('level.index');
Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::get('/user/tambah', [UserController::class, 'tambah'])->name('user.tambah');
Route::post('/user/tambah_simpan', [UserController::class, 'tambah_simpan'])->name('user.tambah_simpan');
Route::get('/user/ubah/{id}', [UserController::class, 'ubah'])->name('user.ubah');
Route::put('/user/ubah_simpan/{id}', [UserController::class, 'ubah_simpan'])->name('user.ubah_simpan');
Route::get('/user/hapus/{id}', [UserController::class, 'hapus'])->name('user.hapus');
Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
Route::post('/kategori', [KategoriController::class, 'store'])->name('kategori.store');
Route::get('/kategori/update/{id}', [KategoriController::class, 'update'])->name('kategori.update');
Route::put('/kategori/update_simpan/{id}', [KategoriController::class, 'update_simpan'])->name('kategori.update_simpan');
Route::delete('/kategori/delete/{id}', [KategoriController::class, 'delete'])->name('kategori.delete');

//user
Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::post('/user', [UserController::class, 'store'])->name('user.store');
Route::put('/user/{id}', [UserController::class, 'edit_simpan'])->name('user.edit_simpan');
Route::get('/user/delete/{id}', [UserController::class, 'delete'])->name('user.delete');
Route::put('/user/edit_simpan/{id}', [UserController::class, 'edit_simpan'])->name('user.edit_simpan');

//level
Route::get('/level', [LevelController::class, 'index'])->name('level.index');
Route::get('/level/create', [LevelController::class, 'create'])->name('level.create');
Route::post('/level', [LevelController::class, 'store'])->name('level.store');
Route::get('/level/edit/{id}', [LevelController::class, 'edit'])->name('level.edit');
Route::put('/level/{id}', [LevelController::class, 'edit_simpan'])->name('level.edit_simpan');
Route::get('/level/delete/{id}', [LevelController::class, 'delete'])->name('level.delete');

//POSController
Route::resource('m_user', POSController::class);

//WelcomeController
Route::get('/', [WelcomeController::class, 'index']);

//modifikasi CRUD user
Route::group(['prefix' => 'user'], function(){
    Route::get('/', [UserController::class, 'index']);             //menampilkan halaman awal user
    Route::post('/list', [UserController::class, 'list']);         //menampilkan data user dalam bentuk json untuk datatables  
    Route::get('/create', [UserController::class, 'create']);      //menampilkan halaman form tambah user
    Route::post('/', [UserController::class, 'store']);            //meyimpan data user baru
    Route::get('/{id}', [UserController::class, 'show']);          //menampilkan detail user
    Route::get('/{id}/edit', [UserController::class, 'edit']);     //menampilkan halaman form edit user
    Route::put('/{id}', [UserController::class, 'update']);        //meyimpan perubahan data user
    Route::delete('/{id}', [UserController::class, 'destroy']);    //menghapus data user

});