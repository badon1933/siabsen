<?php

use Illuminate\Support\Facades\Route;
use Whoops\Run;

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

Route::get('/', function () {
    return view('dashboard.index');
})->name('dashboard');

Route::get('/kelas_mendatang', function () {
    return view('dashboard.kelas_mendatang');
})->name('kelas_mendatang');

Route::get('/jadwal_kuliah', function () {
    return view('dashboard.jadwal_kuliah');
})->name('jadwal_kuliah');
