<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use App\Models\Reticula;
use Illuminate\Http\Request;

class MateriaController extends Controller
{
   public function index(){
    $datos= Materia::with('reticula')->paginate(5);
    $ruta_base ='materias';
    return view('materias.index', compact('datos', 'ruta_base'));
   }
   public function create(){
      $datos= Materia::with('reticula')->paginate(5);
      $ruta_base ='materias';
      $dato= new Materia();
      $reticulas = Reticula::all();
    return view('materias.form', compact('datos', 'ruta_base','reticulas','dato'));
   }
   public function store(Request $request){
      Materia::create($request->all());
      return redirect()->route('materias.index')->with('status','La materia se ha creado');
   }
   public function edit(Materia $materia){
      $datos= Materia::with('reticula')->paginate(5);
      $ruta_base ='materias';
      $dato = $materia;
      $reticulas = [Reticula::find($materia->idReticula)];
      return view('materias.form', compact('dato', 'ruta_base','reticulas','datos'));
   }
   public function destroy(Materia $materia){
      Materia::destroy($materia->idMateria);
      return redirect()->route('materias.index')->with('status','La materia se ha eliminado');
   }
   public function show($materia){
      $datos= Materia::where('nombreMateria','like','%'.$materia.'%')->with('reticula')->paginate(5);
      $ruta_base ='materias';
      return view('materias.index', compact('datos', 'ruta_base'));
     }
}
