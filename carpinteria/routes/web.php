<?php

use App\Http\Controllers\MuebleController;
use App\Http\Controllers\PedidoController;
use App\Models\Mueble;
use Illuminate\Support\Facades\Route;

Route::view('/', 'muebles.index', ['muebles' => Mueble::all()]);

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::view('register', 'register')->name('register');

Route::resource('muebles', MuebleController::class);
Route::resource('pedidos', PedidoController::class);
require __DIR__.'/auth.php';
