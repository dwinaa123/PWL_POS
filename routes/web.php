<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\KategoriController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/level', [LevelController::class, 'index'])->name('level.index');
Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
