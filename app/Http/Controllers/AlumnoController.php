<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Carrera;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class AlumnoController extends Controller
{
    public function index(){
        $datos = Alumno::paginate(5);
        $columnas = Schema::getColumnListing("alumnos");
        $columnas_omitidas = ['created_at', 'updated_at'];
        $ruta_base='alumnos';
        return view("alumnos.index",compact('datos','columnas','columnas_omitidas','ruta_base'));
    }
    public function create(){
        $datos = Alumno::paginate(5);
        $columnas = Schema::getColumnListing("alumnos");
        $columnas_omitidas = ['created_at', 'updated_at'];
        $carreras = Carrera::all();
        $dato = new Alumno();
        $ruta_base='alumnos';
        return view("alumnos.form",compact('datos','columnas','columnas_omitidas','ruta_base','dato','carreras'));
    }
    public function store(Request $request){
        Alumno::create($request->all());
        return redirect()->route('alumnos.index')->with('status','El alumno se ha insertado correctamente');
    }
    public function edit(Alumno $alumno){
        $datos = Alumno::paginate(5); //msotrar tabla
        $columnas = Schema::getColumnListing("alumnos"); //mostrar columnas automaticamente
        $columnas_omitidas = ['created_at', 'updated_at']; // no mostrar columnas como created_at
        $dato = $alumno; //dato a colocar en formulario
        $carreras = [Carrera::find($alumno->idCarrera)];
        $ruta_base='alumnos'; //ruta dinamica
        return view("alumnos.form",compact('datos','columnas','columnas_omitidas','ruta_base','dato','carreras'));
    }
    public function update(Request $request, Alumno $alumno)
    {
        $alumno->update($request->all());
        return redirect()->route('alumnos.index')->with('status','El puesto se ha actualizado');
    }
    public function destroy(Alumno $alumno)
    {
        $alumno->delete();
        return redirect()->route('alumnos.index')->with('status','El puesto se ha eliminado');
    }
}
