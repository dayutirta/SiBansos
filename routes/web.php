<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\BansosController;
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

Route::get('/', [WelcomeController::class, 'index']);

Route::group(['prefix' => 'bansos'], function() {
    Route::get('/', [BansosController::class, 'index']);          // menampilkan halaman awal user
    Route::post('/list', [BansosController::class, 'list']);      // menampilkan data user dalam bentuk json untuk datatables
    Route::get('/create', [BansosController::class, 'create']);   // menampilkan halaman form tambah user
    Route::post('/', [BansosController::class, 'store']);         // menyimpan data user baru
    Route::get('/{id}', [BansosController::class, 'show']);       // menampilkan detail user
    Route::get('/{id}/edit', [BansosController::class, 'edit']);  // menampilkan halaman form edit user
    Route::put('/{id}', [BansosController::class, 'update']);     // menyimpan perubahan data user
    Route::delete('/{id}', [BansosController::class, 'destroy']); // menghapus data user
});

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'proses_login'])->name('proses_login');
Route::group(['middleware' => ['cek_login:1', 'auth']], function () {
    Route::resource('admin', WargaController::class);
});
Route::group(['middleware' => ['cek_login:2', 'auth']], function () {
    Route::resource('rt', WargaController::class);
});
Route::group(['middleware' => ['cek_login:3', 'auth']], function () {
    Route::resource('user', WargaController::class);
});
Route::get('logout', [AuthController::class, 'logout'])->name('logout');