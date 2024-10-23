<?php

namespace App\Http\Controllers;

use App\Models\Depto;
use Illuminate\Http\Request;

class DeptoController extends Controller
{
   
    public function index(){
        $datos= Depto::paginate(5);
        $ruta_base= 'deptos';
        return view('deptos.index',compact('datos','ruta_base'));
    }
    public function create(){
        $datos= Depto::paginate(5);
        $ruta_base= 'deptos';
        $dato =  new Depto();
        return view('deptos.form',compact('datos','ruta_base','dato'));
    }
    public function store(Request $request){
        $request->validate([
            'nombreCorto'=>'max:5'
        ]);
        Depto::create($request->all());
        return redirect()->route('deptos.index')->with('status','El Departamento se ha creado');
    }
    public function edit(Depto $depto){
        $datos= Depto::paginate(5);
        $ruta_base= 'deptos';
        $dato =  $depto;
        return view('deptos.form',compact('datos','ruta_base','dato'));
    }
    public function update(Request $request,Depto $depto){
        $request->validate([
            'nombreCorto'=>'max:5'
            ]);
            $depto->update($request->all());
            return redirect()->route('deptos.index')->with('status','El Departamento se ha actualizado');
    }
    public function destroy(Depto $depto){
        $depto->delete();
        return redirect()->route('deptos.index')->with('status','El Departamento se ha eliminado');
        }
        
        public function show($depto){
            $datos= Depto::where('nombreDepto','like','%'.$depto.'%')->paginate(5);
            $ruta_base= 'deptos';
            return view('deptos.index',compact('datos','ruta_base'));
        }
}
