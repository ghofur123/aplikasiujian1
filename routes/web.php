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
Route::middleware(['web', 'auth:sanctum'])->group(function () {
});


Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login']);
// 
Route::get('/', [DashboardController::class, 'index']);
// 
Route::get('/lembaga', [LembagaController::class, 'index']);
Route::get('/lembaga/{id}', [LembagaController::class, 'show']);
Route::post('/lembaga', [LembagaController::class, 'store']);
Route::put('/lembaga', [LembagaController::class, 'update']);
Route::delete('/lembaga', [LembagaController::class, 'destroy']);
// 
Route::get('/guru', [GuruController::class, 'index']);
Route::get('/guru/{id}', [GuruController::class, 'show']);
Route::post('/guru', [GuruController::class, 'store']);
Route::put('/guru', [GuruController::class, 'update']);
Route::delete('/guru', [GuruController::class, 'destroy']);
Route::get('/guru/form/store', [GuruController::class, 'create']);
// 
Route::post('/guru-import-excel', [GuruImportController::class, 'index']);
// 
Route::get('/jurusan', [JurusanController::class, 'index']);
Route::post('/jurusan', [JurusanController::class, 'store']);
Route::get('/jurusan/{id}', [JurusanController::class, 'show']);
Route::put('/jurusan', [JurusanController::class, 'update']);
Route::delete('/jurusan', [JurusanController::class, 'destroy']);
Route::get('/jurusan/form/store', [JurusanController::class, 'create']);
// 
Route::get('/kelas', [KelasController::class, 'index']);
Route::post('/kelas', [KelasController::class, 'store']);
Route::get('/kelas/{id}', [KelasController::class, 'show']);
Route::put('/kelas', [KelasController::class, 'update']);
Route::delete('/kelas', [KelasController::class, 'destroy']);
Route::get('/kelas/form/store', [KelasController::class, 'create']);
// 
Route::get('/tingkat', [TingkatController::class, 'index']);
Route::post('/tingkat', [TingkatController::class, 'store']);
Route::get('/tingkat/{id}', [TingkatController::class, 'show']);
Route::put('/tingkat', [TingkatController::class, 'update']);
Route::delete('/tingkat', [TingkatController::class, 'destroy']);
Route::get('/tingkat/form/store', [TingkatController::class, 'create']);
// 
Route::get('/mapel', [MapelController::class, 'index']);
Route::post('/mapel', [MapelController::class, 'store']);
Route::get('/mapel/{id}', [MapelController::class, 'show']);
Route::put('/mapel', [MapelController::class, 'update']);
Route::delete('/mapel', [MapelController::class, 'destroy']);
Route::get('/mapel/form/store', [MapelController::class, 'create']);
// 
Route::get('/siswa', [SiswaController::class, 'index']);
Route::post('/siswa', [SiswaController::class, 'store']);
Route::get('/siswa/{id}', [SiswaController::class, 'show']);
Route::put('/siswa', [SiswaController::class, 'update']);
Route::delete('/siswa', [SiswaController::class, 'destroy']);
Route::get('/siswa/form/store', [SiswaController::class, 'create']);

Route::post('/siswa-import-excel', [SiswaImportController::class, 'siswaImport']);
// 
Route::get('/ujian', [UjianController::class, 'index']);
Route::post('/ujian', [UjianController::class, 'store']);
Route::get('/ujian/{id}', [UjianController::class, 'show']);
Route::put('/ujian', [UjianController::class, 'update']);
Route::delete('/ujian', [UjianController::class, 'destroy']);
Route::get('/ujian/form/store', [UjianController::class, 'create']);
// 
Route::get('/bank-soal-pilihan', [BankSoalPilihanController::class, 'index']);
Route::post('/bank-soal-pilihan', [BankSoalPilihanController::class, 'store']);
Route::get('/bank-soal-pilihan/{id}', [BankSoalPilihanController::class, 'show']);
Route::put('/bank-soal-pilihan', [BankSoalPilihanController::class, 'update']);
Route::delete('/bank-soal-pilihan', [BankSoalPilihanController::class, 'destroy']);
Route::get('/bank-soal-pilihan/form/store', [BankSoalPilihanController::class, 'create']);
// 
Route::get('/soal/index/{id}', [SoalController::class, 'index']);
Route::post('/soal', [SoalController::class, 'store']);
Route::get('/soal/{id}', [SoalController::class, 'show']);
Route::put('/soal', [SoalController::class, 'update']);
Route::delete('/soal', [SoalController::class, 'destroy']);
Route::get('/soal/form/store/{bank_soal_pilihan_id}', [SoalController::class, 'create']);
// 
Route::get('/soal-ujian', [SoalUjianController::class, 'index']);
// 
Route::get('/soal-import/form', [SoalImportController::class, 'soalImportForm']);
Route::post('/soal-import/import/excel', [SoalImportController::class, 'soalImport']);
// 
Route::get('/download-file/{name}', [DownloadController::class, 'download']);
// 
Route::get('/component/form/ref/jurusan', [ComponentController::class, 'componentFormJurusan']);
Route::get('/component/form/ref/lembaga', [ComponentController::class, 'componentFormLembaga']);
Route::get('/component/form/ref/mapel', [ComponentController::class, 'componentFormMapel']);

Route::get('/component/lembaga/{search}', [ComponentController::class, 'lembaga']);
Route::get('/component/jurusan/{search}', [ComponentController::class, 'refJurusan']);
Route::get('/component/mapel/{search}', [ComponentController::class, 'refMataPelajaran']);
// 
Route::get('/lembaga-form', [StoreFormController::class, 'lembaga']);
Route::get('/guru-form-excel', [StoreFormController::class, 'guruExcel']);
Route::get('/siswa-form-excel', [StoreFormController::class, 'siswaExcel']);
