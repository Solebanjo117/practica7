<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\Depto;
use Illuminate\Http\Request;

class CarreraController extends Controller
{
   public function index(){
    $datos= Carrera::with('departamento')->paginate(5);
    $ruta_base ='carreras';
    return view('carreras.index', compact('datos', 'ruta_base'));

   }
   public function create(){
    $ruta_base ='carreras';
    $datos= Carrera::with('departamento')->paginate(5);
    $deptos = Depto::all();
    $dato = new Carrera();
    return view('carreras.form', compact('ruta_base','datos','deptos','dato'));
   }
   public function store(Request $request){
    $request->validate([
        'nombreCorto' => 'max:5',
    ]);
    Carrera::create($request->all());
    return redirect()->route('carreras.index')->with('status','La carrera se ha creado');
   }
   public function edit(Carrera $carrera){
    
    $ruta_base ='carreras';
    $deptos = [Depto::find($carrera->idDepto)];
    $dato = $carrera;
    $datos = Carrera::with('departamento')->paginate(5);
    return view('carreras.form', compact('ruta_base','datos','deptos','dato'));

   }
   public function update(Request $request,Carrera $carrera){
    $request->validate([
        'nombreCorto' => 'max:5',
        ]);
        $carrera->update($request->all());
        return redirect()->route('carreras.index')->with('status','La carrera se ha actualizado');
   }
   public function destroy(Carrera $carrera){
    $carrera->delete();
    return redirect()->route('carreras.index')->with('status','La carrera se ha eliminado');
    }
    public function show($carrera){
        $datos= Carrera::where('nombreCarrera','like','%'.$carrera.'%')->with('departamento')->paginate(5);
    $ruta_base ='carreras';
    return view('carreras.index', compact('datos', 'ruta_base'));
    }
   
}
