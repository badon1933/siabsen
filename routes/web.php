<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\Auth\UpdatePasswordController;
use App\Http\Controllers\DosenController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JenjangController;
use App\Http\Controllers\KelasMendatangController;
use App\Http\Controllers\KelasPerkuliahanController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MasterKelasController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\ProgramStudiController;

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

    Route::resource('absen', AbsensiController::class);

    Route::resource('program_studi', ProgramStudiController::class)->except([
        'create'
    ]);

    Route::resource('jenjang', JenjangController::class)->except([
        'create',
        'edit'
    ]);

    Route::resource('mata_kuliah', MataKuliahController::class);
    Route::post('/mata_kuliah/import', [MataKuliahController::class, 'import'])->name('mata_kuliah.import');

    Route::resource('kelas_mendatang', KelasMendatangController::class);

    Route::resource('periode', PeriodeController::class);

    Route::resource('master_kelas', MasterKelasController::class);

    Route::resource('kelas_perkuliahan', KelasPerkuliahanController::class);

    Route::resource('dosen', DosenController::class);
    Route::post('/dosen/import', [DosenController::class, 'import'])->name('dosen.import');

    Route::resource('mahasiswa', MahasiswaController::class);
    Route::post('/mahasiswa/import', [MahasiswaController::class, 'import'])->name('mahasiswa.import');
    Route::get('/mahasiswa/export', [MahasiswaController::class, 'export'])->name('mahasiswa.export');

    Route::post('/update_password', [UpdatePasswordController::class, 'update_password'])->name('update_password');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
