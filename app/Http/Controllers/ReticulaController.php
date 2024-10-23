<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\Reticula;
use Illuminate\Http\Request;

class ReticulaController extends Controller
{
    public function index(){
        $datos= Reticula::with('carrera')->paginate(5);
        $ruta_base ='reticulas';
        return view('reticulas.index', compact('datos', 'ruta_base'));
    }
    public function create(){
        $datos= Reticula::with('carrera')->paginate(5);
        $dato =  new Reticula();
        $carreras = Carrera::all();
        $ruta_base ='reticulas';
        return view('reticulas.form', compact('datos', 'ruta_base','dato','carreras'));
    }
    public function store(Request $request){
        Reticula::create($request->all());
        return redirect()->route('reticulas.index')->with('status','La reticula se ha creado');
    }
    public function edit(Reticula $reticula){
        $datos= Reticula::with('carrera')->paginate(5);
        $dato =  $reticula;
        $carreras = Carrera::all();
        $ruta_base ='reticulas';
        return view('reticulas.form', compact('datos', 'ruta_base','dato','carreras'));
    }
    public function update(Request $request,Reticula $reticula){
        $reticula->update($request->all());
        return redirect()->route('reticulas.index')->with('status','La reticula se ha actualizado');
    }
    public function destroy(Reticula $reticula){
        Reticula::destroy($reticula);
        return redirect()->route('reticulas.index')->with('status','La reticula se ha eliminado');

    }   
    public function show($reticula){

        $datos= Reticula::where('descripcion','like','%'.$reticula.'%')->with('carrera')->paginate(5);
        $ruta_base ='reticulas';
        return view('reticulas.index', compact('datos', 'ruta_base'));
    }
}
