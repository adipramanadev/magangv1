<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin/v1'], function () {
    Route::get('/', [App\Http\Controllers\JurusanController::class, 'index'])->name('jurusan.index');
    Route::get('/jurusan/create', [App\Http\Controllers\JurusanController::class, 'create'])->name('jurusan.create');
    Route::post('/jurusan', [App\Http\Controllers\JurusanController::class, 'store'])->name('jurusan.store');
});