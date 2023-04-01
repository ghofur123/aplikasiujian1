<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LembagaController;
use App\Http\Controllers\Admin\StoreFormController;
use App\Http\Controllers\Admin\GuruController;
use App\Http\Controllers\Admin\GuruImportController;
use App\Http\Controllers\Admin\DownloadController;
use App\Http\Controllers\Admin\JurusanController;
use App\Http\Controllers\Admin\KelasController;
use App\Http\Controllers\Admin\TingkatController;
use App\Http\Controllers\Admin\ComponentController;
use App\Http\Controllers\Admin\MapelController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Admin\SiswaImportController;
use App\Http\Controllers\Admin\UjianController;
use App\Http\Controllers\Admin\BankSoalPilihanController;
use App\Http\Controllers\Admin\SoalController;
use App\Http\Controllers\Admin\SoalImportController;
use App\Http\Controllers\Admin\SoalUjianController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\siswaKartuController;
use App\Http\Controllers\Siswa\UjianSiswaController;
use App\Http\Controllers\Siswa\JawabanPilihanController;
use App\Http\Controllers\Siswa\StatusUjianSiswaController;
use App\Http\Controllers\Siswa\NilaiSiswaController;
use App\Http\Controllers\Admin\GuruUsersController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::middleware(['web', 'auth:sanctum'])->group(function () {
// });

Auth::routes();
// Route::get('/login', [LoginController::class, 'index']);
// Route::post('/login', [LoginController::class, 'login']);
// 
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
// 
Route::prefix('lembaga')->group(function () {
    Route::get('/', [LembagaController::class, 'index']);
    Route::get('/{id}', [LembagaController::class, 'show']);
    Route::post('/', [LembagaController::class, 'store']);
    Route::put('/', [LembagaController::class, 'update']);
    Route::delete('/', [LembagaController::class, 'destroy']);
});
// 
Route::prefix('guru')->group(function () {
    Route::get('/', [GuruController::class, 'index']);
    Route::get('/{id}', [GuruController::class, 'show']);
    Route::post('/', [GuruController::class, 'store']);
    Route::put('/', [GuruController::class, 'update']);
    Route::delete('/', [GuruController::class, 'destroy']);
    Route::get('/form/store', [GuruController::class, 'create']);


    // guru create users
    Route::get('/create-users/{id}', [GuruUsersController::class, 'create']);
});
// 
Route::post('/guru-import-excel', [GuruImportController::class, 'index']);
// 
Route::prefix('jurusan')->group(function () {
    Route::get('/', [JurusanController::class, 'index']);
    Route::post('/', [JurusanController::class, 'store']);
    Route::get('/{id}', [JurusanController::class, 'show']);
    Route::put('/', [JurusanController::class, 'update']);
    Route::delete('/', [JurusanController::class, 'destroy']);
    Route::get('/form/store', [JurusanController::class, 'create']);
});
// 
Route::prefix('kelas')->group(function () {
    Route::get('/', [KelasController::class, 'index']);
    Route::post('/', [KelasController::class, 'store']);
    Route::get('/{id}', [KelasController::class, 'show']);
    Route::put('/{id}', [KelasController::class, 'update']);
    Route::delete('/{id}', [KelasController::class, 'destroy']);
    Route::get('/form/store', [KelasController::class, 'create']);
});
// 
Route::prefix('tingkat')->group(function () {
    Route::get('/', [TingkatController::class, 'index']);
    Route::post('/', [TingkatController::class, 'store']);
    Route::get('/{id}', [TingkatController::class, 'show']);
    Route::put('/', [TingkatController::class, 'update']);
    Route::delete('/', [TingkatController::class, 'destroy']);
    Route::get('/form/store', [TingkatController::class, 'create']);
});

// 
Route::prefix('mapel')->group(function () {
    Route::get('/', [MapelController::class, 'index']);
    Route::post('/', [MapelController::class, 'store']);
    Route::get('/{id}', [MapelController::class, 'show']);
    Route::put('/', [MapelController::class, 'update']);
    Route::delete('/', [MapelController::class, 'destroy']);
    Route::get('/form/store', [MapelController::class, 'create']);
});
// 
Route::prefix('siswa')->group(function () {
    Route::get('/', [SiswaController::class, 'index']);
    Route::post('/', [SiswaController::class, 'store']);
    Route::get('/{id}', [SiswaController::class, 'show']);
    Route::put('/', [SiswaController::class, 'update']);
    Route::delete('/', [SiswaController::class, 'destroy']);
    Route::get('/form/store', [SiswaController::class, 'create']);
    Route::get('/view/{id}', [SiswaController::class, 'view']);
});
Route::get('/kartu-siswa/kartu/{id}', [siswaKartuController::class, 'index']);
// 

Route::post('/siswa-import-excel', [SiswaImportController::class, 'siswaImport']);
// 
Route::prefix('ujian')->group(function () {
    Route::get('/', [UjianController::class, 'index']);
    Route::post('/', [UjianController::class, 'store']);
    Route::get('/{id}', [UjianController::class, 'show']);
    Route::put('/', [UjianController::class, 'update']);
    Route::delete('/', [UjianController::class, 'destroy']);
    Route::get('/form/store', [UjianController::class, 'create']);
    Route::put('/update/status', [UjianController::class, 'updateStatus']);
});
// proses lanjut dari ujian
Route::prefix('pilih-soal')->group(function () {
    Route::get('/{id}', [SoalUjianController::class, 'index']);
    Route::post('/', [SoalUjianController::class, 'store']);
    Route::delete('/', [SoalUjianController::class, 'destroy']);
});
Route::get('/view-soal-in-ujian/{id}/{ujian_id}', [SoalUjianController::class, 'create']);

// 
Route::prefix('bank-soal-pilihan')->group(function () {
    Route::get('/', [BankSoalPilihanController::class, 'index']);
    Route::post('/', [BankSoalPilihanController::class, 'store']);
    Route::get('/{id}', [BankSoalPilihanController::class, 'show']);
    Route::put('/', [BankSoalPilihanController::class, 'update']);
    Route::delete('/', [BankSoalPilihanController::class, 'destroy']);
    Route::get('/form/store', [BankSoalPilihanController::class, 'create']);
});
// 
Route::prefix('soal')->group(function () {
    Route::get('/index/{id}', [SoalController::class, 'index']);
    Route::post('/', [SoalController::class, 'store']);
    Route::get('/{id}', [SoalController::class, 'show']);
    Route::put('/', [SoalController::class, 'update']);
    Route::delete('/', [SoalController::class, 'destroy']);
    Route::get('/form/store/{bank_soal_pilihan_id}', [SoalController::class, 'create']);
});
// 
Route::prefix('soal-import')->group(function () {
    Route::get('/form', [SoalImportController::class, 'soalImportForm']);
    Route::post('/import/excel', [SoalImportController::class, 'soalImport']);
});
// 
Route::prefix('users')->group(function () {
    Route::get('/', [UsersController::class, 'index']);
    Route::get('/get/{kelas_id}', [UsersController::class, 'store']);
    Route::get('/pdf/{kelas_id}', [UsersController::class, 'create']);
});
// 
Route::get('/download-file/{name}', [DownloadController::class, 'download']);
// 
Route::prefix('component')->group(function () {
    Route::prefix('form/ref')->group(function () {
        Route::get('/jurusan', [ComponentController::class, 'componentFormJurusan']);
        Route::get('/lembaga', [ComponentController::class, 'componentFormLembaga']);
        Route::get('/mapel', [ComponentController::class, 'componentFormMapel']);
    });

    Route::get('/lembaga/{search}', [ComponentController::class, 'lembaga']);
    Route::get('/jurusan/{search}', [ComponentController::class, 'refJurusan']);
    Route::get('/mapel/{search}', [ComponentController::class, 'refMataPelajaran']);
});
// 
Route::get('/lembaga-form', [StoreFormController::class, 'lembaga']);
Route::get('/guru-form-excel', [StoreFormController::class, 'guruExcel']);
Route::get('/siswa-form-excel', [StoreFormController::class, 'siswaExcel']);
// 
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// siswa

// 
Route::prefix('ujian-siswa')->group(function () {
    Route::get('/', [UjianSiswaController::class, 'index']);
    Route::get('/mulai', [UjianSiswaController::class, 'create']);
    Route::get('/number/{id}', [UjianSiswaController::class, 'number']);
    Route::get('/{id}', [UjianSiswaController::class, 'show']);
});

// 
Route::prefix('jawaban-pilihan-save')->group(function () {
    Route::get('/', [JawabanPilihanController::class, 'index']);
    Route::post('/', [JawabanPilihanController::class, 'store']);
});

Route::prefix('status-ujian-siswa')->group(function () {
    Route::post('/', [StatusUjianSiswaController::class, 'store']);
});

Route::prefix('nilai-siswa')->group(function () {
    Route::get('/', [NilaiSiswaController::class, 'index']);
});
