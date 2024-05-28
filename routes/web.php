<?php

use App\Http\Controllers\AlatMedisController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin/dashboard');
})->name('dashboard');
Route::get('/login', function () {
    return view('login');
})->name('login');




Route::get('/dataalat', [AlatMedisController::class, 'data_alat'])->name('data_alat');
Route::get('/jenisalat', [AlatMedisController::class, 'jenis_alat'])->name('jenis_alat');
Route::get('/merkalat', [AlatMedisController::class, 'merk_alat'])->name('merk_alat');
Route::get('/ruangalat', [AlatMedisController::class, 'ruang_alat'])->name('ruang_alat');
Route::get('/dataperiksa', [AlatMedisController::class, 'data_periksa'])->name('data_periksa');
Route::get('/register',[AuthController::class, 'register'])->name('register');

