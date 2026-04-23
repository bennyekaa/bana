<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Master\AgamaController;
use App\Http\Controllers\Master\BiodataController;
use App\Http\Controllers\Master\JabatanController;
use App\Http\Controllers\Master\KategoriController;
use App\Http\Controllers\Master\KategoriPelanggaranController;
use App\Http\Controllers\Master\PangkatController;
use App\Http\Controllers\Master\PelanggaranController;
use App\Http\Controllers\Master\PenggunaController;
use App\Http\Controllers\Master\RoleController;
use App\Http\Controllers\transaksi\TransaksiController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('login', [AuthController::class, 'login']);
Route::get('logout', [AuthController::class, 'logout']);
Route::post('actionlogin', [AuthController::class, 'actionlogin']);

Route::middleware('checklogin')->group(
    function () {
        Route::get('/', [AdminController::class, 'index']);
        Route::prefix('master')->group(function () {
            Route::prefix('agama')->group(function () {
                Route::get('index', [AgamaController::class, 'index']);
                Route::get('tambah', [AgamaController::class, 'tambah']);
                Route::post('action', [AgamaController::class, 'action']);
                Route::get('edit/{id}', [AgamaController::class, 'edit']);
                Route::get('hapus/{id}', [AgamaController::class, 'hapus']);
                Route::get('status/{id}/{stat}', [AgamaController::class, 'status']);
            });
            Route::prefix('kategori')->group(function () {
                Route::get('index', [KategoriController::class, 'index']);
                Route::get('tambah', [KategoriController::class, 'tambah']);
                Route::post('action', [KategoriController::class, 'action']);
                Route::get('edit/{id}', [KategoriController::class, 'edit']);
                Route::get('hapus/{id}', [KategoriController::class, 'hapus']);
                Route::get('status/{id}/{stat}', [KategoriController::class, 'status']);
            });
            Route::prefix('kategoripelanggaran')->group(function () {
                Route::get('index', [KategoriPelanggaranController::class, 'index']);
                Route::get('tambah', [KategoriPelanggaranController::class, 'tambah']);
                Route::post('action', [KategoriPelanggaranController::class, 'action']);
                Route::get('edit/{id}', [KategoriPelanggaranController::class, 'edit']);
                Route::get('hapus/{id}', [KategoriPelanggaranController::class, 'hapus']);
                Route::get('status/{id}/{stat}', [KategoriPelanggaranController::class, 'status']);
            });
            Route::prefix('pelanggaran')->group(function () {
                Route::get('index', [PelanggaranController::class, 'index']);
                Route::get('tambah', [PelanggaranController::class, 'tambah']);
                Route::post('action', [PelanggaranController::class, 'action']);
                Route::get('edit/{id}', [PelanggaranController::class, 'edit']);
                Route::get('hapus/{id}', [PelanggaranController::class, 'hapus']);
                Route::get('status/{id}/{stat}', [PelanggaranController::class, 'status']);
            });
            Route::prefix('role')->group(function () {
                Route::get('index', [RoleController::class, 'index']);
                Route::get('tambah', [RoleController::class, 'tambah']);
                Route::post('action', [RoleController::class, 'action']);
                Route::get('edit/{id}', [RoleController::class, 'edit']);
                Route::get('hapus/{id}', [RoleController::class, 'hapus']);
                Route::get('status/{id}/{stat}', [RoleController::class, 'status']);
            });
            Route::prefix('jabatan')->group(function () {
                Route::get('index', [JabatanController::class, 'index']);
                Route::get('tambah', [JabatanController::class, 'tambah']);
                Route::post('action', [JabatanController::class, 'action']);
                Route::get('edit/{id}', [JabatanController::class, 'edit']);
                Route::get('hapus/{id}', [JabatanController::class, 'hapus']);
                Route::get('status/{id}/{stat}', [JabatanController::class, 'status']);
            });
            Route::prefix('pangkat')->group(function () {
                Route::get('index', [PangkatController::class, 'index']);
                Route::get('tambah', [PangkatController::class, 'tambah']);
                Route::post('action', [PangkatController::class, 'action']);
                Route::get('edit/{id}', [PangkatController::class, 'edit']);
                Route::get('hapus/{id}', [PangkatController::class, 'hapus']);
                Route::get('status/{id}/{stat}', [PangkatController::class, 'status']);
            });
            Route::prefix('pengguna')->group(function () {
                Route::get('index', [PenggunaController::class, 'index']);
                Route::get('tambah', [PenggunaController::class, 'tambah']);
                Route::post('action', [PenggunaController::class, 'action']);
                Route::get('edit/{id}', [PenggunaController::class, 'edit']);
                Route::get('hapus/{id}', [PenggunaController::class, 'hapus']);
                Route::get('detail/{id}', [PenggunaController::class, 'detail']);
                Route::get('status/{id}', [PenggunaController::class, 'status']);
            });
        });
        Route::prefix('transaksi')->group(function () {
            Route::prefix('lp')->group(function () {
                Route::get('index', [TransaksiController::class, 'laporanpolisi']);
                Route::get('tambah', [TransaksiController::class, 'tambahlaporanpolisi']);
                Route::get('kirim/{id}', [TransaksiController::class, 'kirim']);
                Route::get('detail/{id}', [TransaksiController::class, 'detail']);
                Route::get('hapus/{id}', [TransaksiController::class, 'hapus']);
                Route::post('proses', [TransaksiController::class, 'proseslaporanpolisi']);
                Route::get('penyidik/{id}', [TransaksiController::class, 'penyidik']);
                Route::get('pin/{id}', [TransaksiController::class, 'pin']);
                Route::post('upload/{id}', [TransaksiController::class, 'upload']);
                Route::post('cek-pin/{id}', [TransaksiController::class, 'cekpin']);
                Route::get('gambar/{file}', [TransaksiController::class, 'lihatGambar']);
            });
        });

    }
);
