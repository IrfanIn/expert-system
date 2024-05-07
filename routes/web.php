<?php

use App\Http\Controllers\analisa_controller;
use App\Http\Controllers\gejala_controller;
use App\Http\Controllers\loginController;
use App\Http\Controllers\penyakit_controller;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;

Route::get('', fn () => redirect('login'))->name('landing')->middleware('guest');
Route::post('logout', [loginController::class, 'logout'])->name('logout');

Route::controller(loginController::class)->middleware('guest')->group(function () {
    Route::get('login', 'index')->name('login');
    Route::post('login', 'login')->name('login.post');
    Route::get('daftar', 'index')->name('daftar');
    Route::post('daftar', 'signup')->name('daftar.post');
});

Route::middleware('auth')->group(function () {
    Route::get('analisa', [analisa_controller::class, 'analisa'])->name('analisa');
    Route::post('analisa', [analisa_controller::class, 'analisa_store'])->name('analisa.store');
    Route::resource('pakar', penyakit_controller::class);
    Route::resource('gejala', gejala_controller::class);
});
