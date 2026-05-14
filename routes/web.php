<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\PrestamoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AutorController;
use Illuminate\Support\Facades\Route;
 
Route::get('/', function () {
    return view('welcome');
});
 
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
 
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
 
 
Route::get('/libros', [LibroController::class, 'index'])->name('libros.index');
Route::get('/libros/{id}/editar', [LibroController::class, 'edit'])->name('libros.edit');
Route::put('/libros/{id}', [LibroController::class, 'update'])->name('libros.update');
Route::delete('/libros/{id}', [LibroController::class, 'destroy'])->name('libros.destroy');
 
Route::get('/prestamos', [PrestamoController::class, 'index'])->name('prestamos.index');
Route::get('/prestamos/crear', [PrestamoController::class, 'create'])->name('prestamos.create');
Route::post('/prestamos', [PrestamoController::class, 'store'])->name('prestamos.store');
 
 
Route::resource('usuarios', UsuarioController::class);
Route::get('/usuarios/{id}/editar', [UsuarioController::class, 'edit'])->name('usuarios.edit');
Route::delete('/usuarios/{id}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');
 
Route::resource('autores', AutorController::class);
Route::get('/autores/{id}/editar', [AutorController::class, 'edit'])->name('autores.edit');
Route::delete('/autores/{id}', [AutorController::class, 'destroy'])->name('autores.destroy');
 
require __DIR__.'/auth.php';
