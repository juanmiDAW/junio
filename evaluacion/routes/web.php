<?php

use App\Http\Controllers\AlumnoController;
use App\Models\Ccee;
use App\Models\Nota;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::resource('alumnos', AlumnoController::class);

Route::get('alumno/criterios/{id}', function($id){

    $notas = Nota::with('ccee')->where('alumno_id', $id)->get();

    return view('criterios.show', ['notas'=>$notas]);
})->name('criterios.show');

require __DIR__ . '/auth.php';
