<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\PaqueteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [ProyectoController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/Proyectos', [ProyectoController::class, 'index'])->name('proyectos.index');
Route::post('/Proyectos', [ProyectoController::class, 'store'])->name('proyectos.store');
Route::get('/Proyectos/create', [ProyectoController::class, 'create'])->name('proyectos.create');
Route::delete('/Proyectos/{proyectos}', [ProyectoController::class, 'destroy'])->name('proyectos.destroy');
Route::put('/Proyectos/{proyecto}', [ProyectoController::class, 'update'])->name('proyectos.update');
Route::get('/Proyectos/{proyectos}/edit', [ProyectoController::class, 'edit'])->name('proyectos.edit');


Route::get('/Paquetes', [PaqueteController::class, 'index'])->name('paquetes.index');
Route::post('/Paquetes', [PaqueteController::class, 'store'])->name('paquetes.store');
Route::get('/Paquetes/create', [PaqueteController::class, 'create'])->name('paquetes.create');
require __DIR__.'/auth.php';
