<?php
 
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\PrestamoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AutorController;
 
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
 
// Rutas de Libros (Limpias sin duplicados)
Route::middleware('auth')->group(function () {
    Route::get('/libros', [LibroController::class, 'index'])->name('libros.index');
    Route::get('/libros/{id}/editar', [LibroController::class, 'edit'])->name('libros.edit');
    Route::put('/libros/{id}', [LibroController::class, 'update'])->name('libros.update');
    Route::delete('/libros/{id}', [LibroController::class, 'destroy'])->name('libros.destroy');
});
 
// Rutas de Préstamos
Route::get('/prestamos', [PrestamoController::class, 'index'])->name('prestamos.index');
Route::get('/prestamos/crear', [PrestamoController::class, 'create'])->name('prestamos.create');
Route::post('/prestamos', [PrestamoController::class, 'store'])->name('prestamos.store')->middleware('auth');
Route::patch('/prestamos/{id}', [PrestamoController::class, 'update'])->name('prestamos.update');

// RECURSOS COMPLETOS - No necesitás poner los métodos uno por uno abajo
Route::resource('usuarios', UsuarioController::class)->middleware('auth');
Route::resource('autores', AutorController::class)->middleware('auth');

require __DIR__.'/auth.php';