<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\InicioController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('auth.login');
Route::post('/logout', [LoginController::class, 'logout'])->name('auth.logout');
//Route::get('/registrarse', [RegisterController::class, 'index'])->name('register');
// Route::post('/registrarse', [RegisterController::class, 'login'])->name('auth.login');

Route::get('/', [InicioController::class, 'index'])->name('inicio')->middleware('auth');
// Route::get('/', function () {
//     return view('inicio');
// })->middleware('auth')->name('inicio');

// Route::get('/', InicioController::class, 'index')->name('inicio');