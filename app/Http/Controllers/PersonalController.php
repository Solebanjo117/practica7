<?php

namespace App\Http\Controllers;

use App\Models\Depto;
use App\Models\Personal;
use App\Models\Puesto;
use Illuminate\Http\Request;

class PersonalController extends Controller
{
    public function index(){
        $datos= Personal::with(['depto','puesto'])->paginate(5);
        $ruta_base ='personals';
        return view('personals.index', compact('datos', 'ruta_base'));
    }
    public function create(){
        $dato = new Personal();
        $datos= Personal::with(['depto','puesto'])->paginate(5);
        $deptos= Depto::all();
        $puestos = Puesto::all();
        $ruta_base ='personals';
        return view('personals.form',compact('dato','datos', 'ruta_base','deptos','puestos'));
    }
    public function store(Request $request){
        Personal::create($request->all());
        return redirect()->route('personals.index')->with('status','El personal ha sido registrado');
    }
    public function edit(Personal $personal){
        $dato = $personal;
        $datos= Personal::with(['depto','puesto'])->paginate(5);
        $deptos= Depto::all();
        $puestos = Puesto::all();
        $ruta_base ='personals';
        return view('personals.form',compact('dato','datos', 'ruta_base','deptos','puestos'));
    }
    public function update(Request $request, Personal $personal){
        $personal->update($request->all());
        return redirect()->route('personals.index')->with('status','El personal ha sido actualizado');
        }
    public function destroy(Personal $personal){
        $personal->delete();
        return redirect()->route('personals.index')->with('status','El personal ha sido eliminado');
        }
}
