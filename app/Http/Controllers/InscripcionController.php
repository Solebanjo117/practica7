<?php

namespace App\Http\Controllers;

use App\Models\Inscripcion;
use App\Models\Alumno;
use App\Models\Cita;
use App\Models\Periodo;
use Illuminate\Http\Request;

class InscripcionController extends Controller
{
    public function index()
    {
        // Obtener todos los alumnos y periodos disponibles
        $alumnos = Alumno::whereHas('archivos', function($query) {
            $query->where('verificado', 1);  // Filtrar por archivos verificados
        })->get();
        $periodos = Periodo::all();

        return view('inscripcion', compact('alumnos', 'periodos'));
    }

    public function inscribir(Request $request)
    {
       
       // Verificar si el alumno ya tiene alguna inscripción (en cualquier periodo)
  $inscripcion = Inscripcion::where('alumno_id', $request->alumno_id)
    ->first();

// Definir el estado
$estado = $inscripcion ? 'reinscrito' : 'inscrito';
$mensaje = $estado == 'reinscrito' ? 'Reinscripción exitosa' : 'Inscripción exitosa';

if ($inscripcion) {
// Si ya tiene inscripción, actualizar la inscripción existente
$inscripcion->estado = 'reinscrito';  // Cambiar el estado a "reinscrito"

// Asumiendo que el semestre es un campo que puedes aumentar, podrías hacer algo como:
// Incrementar el semestre en 1
$inscripcion->semestre = $inscripcion->semestre + 1;  // Aumentar semestre

// Guardar los cambios
$inscripcion->save();
} else {
// Si no tiene inscripción, crear una nueva inscripción
Inscripcion::create([
'alumno_id' => $request->alumno_id,
'periodo_id' => $request->periodo_id,
'estado' => $estado,  // El estado será "inscrito"
'semestre' => 1,  // Si es la primera inscripción, asignar el semestre 1
]);
}
$alumno = Alumno::where('noctrl',$request->alumno_id)->first();
    if ($alumno) {
        $alumno->archivos()->delete();  // Eliminar todos los archivos del alumno
    }
    
    $semestre = $inscripcion ? $inscripcion->semestre : 1;
    $fecha_cita= now()->addDays($semestre);
    $cita=Cita::create([
        'alumno_id' => $request->alumno_id,
        'semestre' => $semestre,
        'fecha_cita' => $fecha_cita,  // Fecha de cita asignada
        'turno' => 'mañana',  // Puedes asignar el turno aquí si es necesario
    ]);

// Redirigir con el mensaje de éxito
return redirect()->back()->with('success', $mensaje.' '.'Cita creada para la fecha de: '.$fecha_cita);
    }
}
