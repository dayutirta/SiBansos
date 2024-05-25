<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\BansosController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//route index testing tampilan
Route::get('/', [WelcomeController::class, 'index']);

//route login
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'proses_login'])->name('proses_login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

//route autentikasi berdasarkan levelnya
Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['cek_login:1']], function () {
        Route::get('/admin/index', [UserController::class, 'index'])->name('admin.index');
    });
    Route::group(['middleware' => ['cek_login:2']], function () {
        Route::get('/rt/index', [UserController::class, 'index'])->name('rt.index');
    });
    Route::group(['middleware' => ['cek_login:3']], function () {
        Route::get('/user/index', [UserController::class, 'index'])->name('user.index');
    });
});

//route warga
Route::group(['prefix' => 'warga'], function() {
    Route::get('/', [WargaController::class, 'index']);          
    Route::post('/list', [WargaController::class, 'list']);      
    Route::get('/create', [WargaController::class, 'create']);   
    Route::post('/', [WargaController::class, 'store']);         
    Route::get('/{id}', [WargaController::class, 'show']);       
    Route::get('/{id}/edit', [WargaController::class, 'edit']);  
    Route::put('/{id}', [WargaController::class, 'update']);     
    Route::delete('/{id}', [WargaController::class, 'destroy']); 
});

//route bansos
Route::group(['prefix' => 'bansos'], function() {
    Route::get('/', [BansosController::class, 'index']);          
    Route::post('/list', [BansosController::class, 'list']);      
    Route::get('/create', [BansosController::class, 'create']);   
    Route::post('/', [BansosController::class, 'store']);         
    Route::get('/{id}', [BansosController::class, 'show']);       
    Route::get('/{id}/edit', [BansosController::class, 'edit']);  
    Route::put('/{id}', [BansosController::class, 'update']);     
    Route::delete('/{id}', [BansosController::class, 'destroy']); 
});