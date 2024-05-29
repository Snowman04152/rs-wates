<?php

use App\Http\Controllers\AlatMedisController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


Route::get('/login', function () {
    return view('login');
})->name('login');
Route::get('/register',[AuthController::class, 'register'])->name('register');
Auth::routes();

Route::middleware(['auth', 'checkrole:1'])->group(function () {
    Route::get('/', function () {
        return view('admin/dashboard');
    })->name('dashboard');
    Route::get('/dataalat', [AlatMedisController::class, 'data_alat'])->name('data_alat');
    Route::get('/jenisalat', [AlatMedisController::class, 'jenis_alat'])->name('jenis_alat');
    Route::get('/merkalat', [AlatMedisController::class, 'merk_alat'])->name('merk_alat');
    Route::get('/ruangalat', [AlatMedisController::class, 'ruang_alat'])->name('ruang_alat');
    Route::get('/dataperiksa', [AlatMedisController::class, 'data_periksa'])->name('data_periksa');

});
Route::middleware(['auth', 'checkrole:2 '])->group(function () {
    Route::get('/dashboarduser', function () {
        return view('user/dashboard');
    })->name('dashboarduser');
    Route::get('/dataalatuser', [AlatMedisController::class, 'data_alat_user'])->name('data_alat_user');
    Route::get('/jenisalatuser', [AlatMedisController::class, 'jenis_alat_user'])->name('jenis_alat_user');
    Route::get('/merkalatuser', [AlatMedisController::class, 'merk_alat_user'])->name('merk_alat_user');
    Route::get('/ruangalatuser', [AlatMedisController::class, 'ruang_alat_user'])->name('ruang_alat_user');
    Route::get('/dataperiksauser', [AlatMedisController::class, 'data_periksa_user'])->name('data_periksa_user');
});



