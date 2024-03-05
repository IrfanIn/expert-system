<?php

use App\Http\Controllers\loginController;
use App\Http\Controllers\penyakit_controller;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;

Route::controller(WebController::class)->group(function () {
    Route::get('', 'landing')->name('landing');
    Route::get('diagnosa', 'diagnosa')->name('landing.diagnosa');
    Route::get('result', 'result_store')->name('landing.result');

    Route::controller(loginController::class)->group(function () {
        Route::get('login', 'index')->name('login');
        Route::post('login', 'login')->name('login.post');
        Route::get('daftar', 'index')->name('daftar');
        Route::post('daftar', 'signup')->name('daftar.post');
        Route::post('logout', 'logout')->name('logout');
    });

    Route::get('dashboard', 'dashboard')->name('dashboard');
    Route::get('analisa', 'analisa')->name('analisa');
});

Route::resource('pakar', penyakit_controller::class);
