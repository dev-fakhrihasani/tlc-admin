<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PendaftarController;

Route::get('/', function () {
    return view('layouts/main');
});

Route::resource('pendaftar', PendaftarController::class);
