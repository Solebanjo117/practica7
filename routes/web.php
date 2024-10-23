<?php
namespace App\Http\Controllers;
use App\Http\Controllers\ProfileController;
use App\Models\Depto;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('alumnos',AlumnoController::class);
Route::resource('plazas',PlazaController::class);
Route::resource('puestos',PuestoController::class);
Route::resource('deptos',DeptoController::class);
Route::resource('carreras',CarreraController::class);
Route::resource('reticulas',ReticulaController::class);
Route::resource('materias',MateriaController::class);
Route::resource('periodos',PeriodoController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
