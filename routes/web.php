<?php

use App\Http\Controllers\AlatMedisController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;


Route::get('/login', function () {
    return view('login');
})->name('login');

Auth::routes();
// Route::get('/register',[AuthController::class, 'register'])->name('register');

// Route::post('/register',[AuthController::class, 'store'])->name('register.store');


Route::middleware(['auth', 'checkrole:1'])->group(function () {
    Route::get('/', function () {
        return view('admin/dashboard');
    })->name('dashboard');
    Route::get('/dataalat', [AlatMedisController::class, 'data_alat'])->name('data_alat');
    Route::post('/dataalat', [AlatMedisController::class, 'CreateDataalat'])->name('data.add');
    Route::put('/dataalat/edit/{id}', [AlatMedisController::class, 'editDataalat'])->name('data.edit');
    Route::delete('/dataalat/{id}', [AlatMedisController::class, 'deleteDataalat'])->name('data.delete');
    Route::get('/jenisalat', [AlatMedisController::class, 'jenis_alat'])->name('jenis_alat');
    Route::post('/jenisalat', [AlatMedisController::class, 'createJenis'])->name('jenis.add');
    Route::put('/jenisalat/edit/{id}', [AlatMedisController::class, 'editJenis'])->name('jenis.edit');
    Route::delete('/jenisalat/{id}', [AlatMedisController::class, 'deleteJenis'])->name('jenis.delete');
    Route::get('/merkalat', [AlatMedisController::class, 'merk_alat'])->name('merk_alat');
    Route::post('/merkalat', [AlatMedisController::class, 'createMerk'])->name('merk.add');
    Route::put('/merkalat/edit/{id}', [AlatMedisController::class, 'editMerk'])->name('merk.edit');
    Route::delete('/merkalat/{id}', [AlatMedisController::class, 'deleteMerk'])->name('merk.delete');
    Route::get('/ruangalat', [AlatMedisController::class, 'ruang_alat'])->name('ruang_alat');
    Route::post('/ruangalat', [AlatMedisController::class, 'createRuangan'])->name('ruang.add');
    Route::put('/ruangalat/edit/{id}', [AlatMedisController::class, 'editRuangan'])->name('ruang.edit');
    Route::delete('/ruangalat/{id}', [AlatMedisController::class, 'deleteRuang'])->name('ruang.delete');
    Route::get('/dataperiksa', [AlatMedisController::class, 'data_periksa'])->name('data_periksa');
    Route::post('/dataperiksa', [AlatMedisController::class, 'CreatePemeliharaan'])->name('pemeliharaan.add');
    Route::put('/dataperiksa/edit/{id}', [AlatMedisController::class, 'EditPemeliharaan'])->name('pemeliharaan.edit');
    Route::delete('/dataperiksa/{id}', [AlatMedisController::class, 'DeletePemeliharaan'])->name('pemeliharaan.delete');


    Route::get('/datauser', [AlatMedisController::class, 'data_user'])->name('data_user');
    Route::post('/datauser', [AuthController::class, 'createUser'])->name('user.add');
    Route::put('/datauser/edit/{id}', [AuthController::class, 'editUser'])->name('user.edit');
    Route::delete('/datauser/{id}', [AuthController::class, 'deleteuser'])->name('user.delete');
    Route::put('/datauser/reset/{id}', [AuthController::class, 'ResetPassword'])->name('reset.password');
    Route::get('/public-disk', function () {
        Storage::disk('public');
        Route::get('/retrieve-public-file', function () {
            if (Storage::disk('public')) {
                $contents = Storage::disk('public');
            } else {
                $contents = 'File does not exist';
            }
            return $contents;
        });
    });
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
Route::middleware(['auth', 'checkrole:3 '])->group(function () {
    Route::get('/dashboardpegawai', function () {
        return view('pegawai/dashboard');
    })->name('dashboardpegawai');
    Route::get('/dataperiksapegawai', [AlatMedisController::class, 'data_periksa_pegawai'])->name('data_periksa_pegawai');
});
Route::middleware(['auth', 'checkrole:4 '])->group(function () {
    Route::get('/dashboardkepalaruang', function () {
        return view('kepalaruang/dashboard');
    })->name('dashboardkepalaruang');
    Route::get('/dataperiksakepalaruang', [AlatMedisController::class, 'data_periksa_kepalaruang'])->name('data_periksa_kepalaruang');
});

Route::get('/logout', [LoginController::class,'logout']);
