<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Carrera;
use App\Models\Grupo;
use App\Models\Inscripcion;
use App\Models\Materia;
use App\Models\Periodo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class JsonController extends Controller
{
    public function periodos(){
        return Periodo::all();
    }
    public function semestres(){
        $materias = Materia::get();
        $materias = DB::table('materias')->select('semestre')->groupBy('semestre')->orderBy('semestre')->get();
        return $materias;
    }
    public function carreras(){
        return Carrera::all();
    }
    public function alumnos(){
        return DB::table('alumnos')->get();
    }
    public function gruposHorarios($id){
        $idGrupo= DB::table('grupos')->where('nombreGrupo',$id)->first()->idGrupo;
        return DB::table('grupo_horarios')->where('idGrupo',$idGrupo)->get();
    }
    public function archivo($noctrl){
        return DB::table('archivos')->where('noctrl',$noctrl)->get();
    }
    public function obtenerMaterias($turno, $alumno_id)
{
     // Obtener la carrera del alumno
     $alumno = Alumno::find($alumno_id);
     $carrera_id = $alumno->carrera->idCarrera;
 
     // Obtener los grupos que tienen materias abiertas, filtrados por el turno
     $grupos = Grupo::whereHas('materia.reticula.carrera', function($query) use ($carrera_id) {
         // Filtrar por carrera del alumno
         $query->where('idCarrera', $carrera_id);
     })
     ->whereHas('horarios', function ($query) use ($turno) {
         // Filtrar por turno y horario
         if ($turno == 'mañana') {
             // Filtrar por hora antes de las 2 p.m. (14:00:00)
             $query->where('hora', '<', '14:00:00');
         } elseif ($turno == 'tarde') {
             // Filtrar por hora después de las 2 p.m. (14:00:00)
             $query->where('hora', '>=', '14:00:00');
         }
     })
     ->with(['materia', 'horarios']) // Cargar las relaciones de materia y horarios
     ->get();
 
     // Devolver los grupos con las materias abiertas y horarios filtrados
     return $grupos;
}
public function inscribirAlumno(Request $request)
{

    // Obtener el alumno
    $alumno = Alumno::find($request->alumno_id);
   // Verificar si ya está inscrito en algún grupo
    foreach ($request->grupos as $grupo_id) {
        // Verificar si el alumno ya está inscrito en el grupo
        $inscripcionExistente = DB::table('alumno_grupo')
            ->where('alumno_id', $alumno->noctrl)
            ->where('grupo_id', $grupo_id)
            ->first();

        if ($inscripcionExistente) {
            // Si ya está inscrito, podemos omitirlo o actualizar la inscripción
            continue;
        }

        // Insertar la relación en la tabla alumno_grupo
        DB::table('alumno_grupo')->insert([
            'alumno_id' => $alumno->noctrl,
            'grupo_id' => $grupo_id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }   
    $alumno->cita()->delete();

    return response()->json(['success' => true,'alumno'=>$alumno->nombreAlumno.' '.$alumno->apellidoPaterno]);
}
public function getHorarioAlumno($alumnoId)
{
    $alumno = Alumno::with(['grupos.horarios.lugar'])->find($alumnoId);  // Incluir lugar en la relación de horarios

    if (!$alumno) {
        return response()->json([], 404);  // Si no se encuentra el alumno, devolver 404
    }

    $horarios = $alumno->grupos->map(function ($grupo) {
        return [
            'materia' => [
                'nombreMateria' => $grupo->materia->nombreMateria,
                'semestre' => $grupo->materia->semestre
            ],
            'nombreGrupo' => $grupo->nombreGrupo,
            'horarios' => $grupo->horarios->map(function ($horario) {
                // Verifica si el lugar está presente antes de acceder a él
                $lugar = $horario->lugar ? $horario->lugar->nombre : 'No asignado'; // Lugar predeterminado si no tiene lugar
                return [
                    'dia' => $horario->dia,
                    'hora' => $horario->hora,
                    'lugar' => $lugar
                ];
            })->toArray()
        ];
    })->toArray();

    return response()->json($horarios, 200);
}




}
