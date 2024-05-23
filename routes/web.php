<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\WargaController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'proses_login'])->name('proses_login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::group(['middleware' => ['auth']], function () {
    route::group(['middleware' => ['cek_login:1,2']], function () {
        Route::resource('admin', WargaController::class);
    });

    route::group(['middleware' => ['cek_login:3']], function () {
        Route::resource('user', WargaController::class);
    });
});