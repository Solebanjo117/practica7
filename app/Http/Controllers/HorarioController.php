<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Inscripcion;
use App\Models\Materia;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    public function index(){
        $alumnos = Alumno::whereHas('cita')->with('cita')->get();
        return view('alumnos.horario',compact('alumnos'));
    }
  

}
