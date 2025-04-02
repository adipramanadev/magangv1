<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin/v1'], function () {
    //User
    Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [App\Http\Controllers\UserController::class, 'create'])->name('user.create');
    Route::post('/user', [App\Http\Controllers\UserController::class, 'store'])->name('user.store');
    Route::get('/user/{id}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{id}/update', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{id}/destroy', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy');
    
    //Jurusan
    Route::get('/', [App\Http\Controllers\JurusanController::class, 'index'])->name('jurusan.index');
    Route::get('/jurusan/create', [App\Http\Controllers\JurusanController::class, 'create'])->name('jurusan.create');
    Route::post('/jurusan', [App\Http\Controllers\JurusanController::class, 'store'])->name('jurusan.store');
    Route::get('/jurusan/{id}/edit', [App\Http\Controllers\JurusanController::class, 'edit'])->name('jurusan.edit');
    Route::put('/jurusan/{id}/update', [App\Http\Controllers\JurusanController::class, 'update'])->name('jurusan.update');
    Route::delete('/jurusan/{id}/destroy', [App\Http\Controllers\JurusanController::class, 'destroy'])->name('jurusan.destroy');

    //Dudi
    Route::get('/dudi', [App\Http\Controllers\DudiController::class, 'index'])->name('dudi.index');
    Route::get('/dudi/create', [App\Http\Controllers\DudiController::class, 'create'])->name('dudi.create');
    Route::post('/dudi', [App\Http\Controllers\DudiController::class, 'store'])->name('dudi.store');
    Route::get('/dudi/{id}/edit', [App\Http\Controllers\DudiController::class, 'edit'])->name('dudi.edit');
    Route::put('/dudi/{id}/update', [App\Http\Controllers\DudiController::class, 'update'])->name('dudi.update');
    Route::delete('/dudi/{id}/destroy', [App\Http\Controllers\DudiController::class, 'destroy'])->name('dudi.destroy');

    //Guru 
    Route::get('/guru', [App\Http\Controllers\GuruController::class, 'index'])->name('guru.index');
    Route::get('/guru/create', [App\Http\Controllers\GuruController::class, 'create'])->name('guru.create');
    Route::post('/guru', [App\Http\Controllers\GuruController::class, 'store'])->name('guru.store');
    Route::get('/guru/{id}/edit', [App\Http\Controllers\GuruController::class, 'edit'])->name('guru.edit');
    Route::put('/guru/{id}/update', [App\Http\Controllers\GuruController::class, 'update'])->name('guru.update');
    Route::delete('/guru/{id}/destroy', [App\Http\Controllers\GuruController::class, 'destroy'])->name('guru.destroy');

    //Pengajuan PKL
    Route::get('/pengajuan', [App\Http\Controllers\PengajuanPKLController::class, 'index'])->name('pengajuan.index');
    Route::get('/pengajuan/create', [App\Http\Controllers\PengajuanPKLController::class, 'create'])->name('pengajuan.create');
    Route::post('/pengajuan', [App\Http\Controllers\PengajuanPKLController::class, 'store'])->name('pengajuan.store');
    Route::get('/pengajuan/{id}/edit', [App\Http\Controllers\PengajuanPKLController::class, 'edit'])->name('pengajuan.edit');
    Route::put('/pengajuan/{id}/update', [App\Http\Controllers\PengajuanPKLController::class, 'update'])->name('pengajuan.update');
    Route::delete('/pengajuan/{id}/destroy', [App\Http\Controllers\PengajuanPKLController::class, 'destroy'])->name('pengajuan.destroy');


    
});

//route : untuk mengambil data 
Route::get('hello', function () {
    return '<h1>Hello World</h1>';
});

Route::get('helloworld', [App\Http\Controllers\MicroteachingController::class, 'index']);