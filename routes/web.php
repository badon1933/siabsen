<?php

use App\Http\Controllers\Auth\UpdatePasswordController;
use Whoops\Run;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::redirect('/', '/login', 301);

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard.index', [
            'user' => Auth::user()
        ]);
    })->name('dashboard');

    Route::get('/kelas_mendatang', function () {
        return view('dashboard.kelas_mendatang', [
            'user' => Auth::user()
        ]);
    })->name('kelas_mendatang');

    Route::get('/jadwal_kuliah', function () {
        return view('dashboard.jadwal_kuliah', [
            'user' => Auth::user()
        ]);
    })->name('jadwal_kuliah');

    Route::get('/pengaturan_akun', function () {
        return view('dashboard.pengaturan_akun', [
            'user' => Auth::user()
        ]);
    })->name('pengaturan_akun');

    Route::post('/absen/store', function () {})->name('absen.store');

    Route::post('/update_password', [UpdatePasswordController::class, 'update_password'])->name('update_password');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
