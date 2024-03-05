<?php

use App\Http\Controllers\LevelController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/level', [LevelController::class, 'index'])->name('level.index');
Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
Route::get('/user', [UserController::class, 'index'])->name('user.index');