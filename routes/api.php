<?php

use App\Http\Controllers\JsonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get('/periodos',[JsonController::class,'periodos']);
Route::get('/carreras',[JsonController::class,'carreras']);
Route::get('/semestres',[JsonController::class,'semestres']);
Route::get('/alumnos',[JsonController::class,'alumnos']);
Route::get('/archivos/{noctrl}',[JsonController::class,'archivo']);
Route::get('/gruposHorarios/{id}',[JsonController::class,'gruposHorarios']);
Route::get('/materias-disponibles/{turno}/{alumno_id}', [JsonController::class, 'obtenerMaterias']);
Route::post('/inscribir-alumno', [JsonController::class, 'inscribirAlumno']);
Route::get('horario-alumno/{alumnoId}', [JsonController::class, 'getHorarioAlumno']);
Route::post('insOrUpdtGrpo',[JsonController::class,'insOrUpdtGrpo']);
Route::get('departamentos',[JsonController::class,'departamentos']);
Route::get('edificios',[JsonController::class,'edificios']);
Route::get('lugares',[JsonController::class,'lugares']);
Route::get('personal',[JsonController::class,'personal']);
Route::get('materias',[JsonController::class,'materias']);
Route::post('insertarHorario',[JsonController::class,'insertHorario']);
Route::post('borrarHorario',[JsonController::class,'borrarHorario']);
Route::get('horarios',[JsonController::class,'horarios']);
Route::post('agregarMateria',[JsonController::class,'aggMat']);
Route::post('agregarProfe',[JsonController::class,'aggProf']);





