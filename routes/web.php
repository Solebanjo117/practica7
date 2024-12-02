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
Route::resource('materiasA',MateriaAbiertaController::class);
Route::resource('personals',PersonalController::class);
Route::resource('personalplazas',PersonalPlazaController::class);
Route::resource('edificios',EdificioController::class);
Route::resource('lugares',LugarController::class);
Route::resource('grupos',GrupoController::class);
Route::resource('asignarGrupo',GrupoHorarioController::class);
Route::resource('vista',HorarioAlumnoController::class);
Route::resource('index21327',Grupo21327Controller::class);
Route::get('api', [GrupoHorarioController::class, 'prueba'])->name('asignarGrupo.prueba');
Route::get('/asignarGrupo/{param1}/{param2}/{param3}/{param4}', [GrupoHorarioController::class, 'show'])->name('asignarGrupo.show');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/horarioAlumn', function () {
    return view('horarioAlumn');
})->name('horarioAlumn');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
