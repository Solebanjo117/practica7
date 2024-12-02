<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\Materia;
use App\Models\Periodo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
}
