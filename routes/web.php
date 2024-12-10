<?php
namespace App\Http\Controllers;
use App\Http\Controllers\ProfileController;
use App\Models\Depto;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('alumnos',AlumnoController::class)->middleware('auth');
Route::resource('plazas',PlazaController::class)->middleware('auth');
Route::resource('puestos',PuestoController::class)->middleware('auth');
Route::resource('deptos',DeptoController::class)->middleware('auth');
Route::resource('carreras',CarreraController::class)->middleware('auth');
Route::resource('reticulas',ReticulaController::class)->middleware('auth');
Route::resource('materias',MateriaController::class)->middleware('auth');
Route::resource('periodos',PeriodoController::class)->middleware('auth');
Route::resource('materiasA',MateriaAbiertaController::class)->middleware('auth');
Route::resource('personals',PersonalController::class)->middleware('auth');
Route::resource('personalplazas',PersonalPlazaController::class)->middleware('auth');
Route::resource('edificios',EdificioController::class)->middleware('auth');
Route::resource('lugares',LugarController::class)->middleware('auth');
Route::resource('grupos',GrupoController::class)->middleware('auth');
Route::resource('asignarGrupo',GrupoHorarioController::class)->middleware('auth');
Route::resource('vista',HorarioAlumnoController::class)->middleware('auth');
Route::resource('index21327',Grupo21327Controller::class)->middleware('auth');
Route::resource('docentes',HorarioMaestroController::class)->middleware('auth');
Route::get('/verarchivos', [ArchivoController::class, 'verArchivos'])->name('verArchivos')->middleware('auth');;
Route::get('/verArchivos/{alumno}', [ArchivoController::class, 'showAlumnArchivo'])->name('verArchivos.show')->middleware('auth');;
Route::get('api', [GrupoHorarioController::class, 'prueba'])->name('asignarGrupo.prueba');
Route::get('/asignarGrupo/{param1}/{param2}/{param3}/{param4}', [GrupoHorarioController::class, 'show'])->name('asignarGrupo.show');
Route::resource('archivos',ArchivoController::class);
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/horarioAlumn', function () {
    return view('horarioAlumn');
})->name('horarioAlumn');


Route::middleware('auth')->group(function () {
    Route::get('/verHorario', [AlumnoController::class, 'mostrarVistaHorarios'])->name('alumnos.horario');
    Route::resource('horarioAlumno',HorarioController::class)->middleware('auth');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('inscripcion', [InscripcionController::class, 'index'])->name('inscripcion.index');
Route::post('inscripcion', [InscripcionController::class, 'inscribir'])->name('inscripcion');
Route::post('reinscripcion', [InscripcionController::class, 'reinscribir'])->name('reinscripcion');
});




require __DIR__.'/auth.php';
