<?php

namespace App\Http\Controllers;

use App\Models\Periodo;
use Illuminate\Http\Request;

class PeriodoController extends Controller
{
    public function index(){
        $ruta_base = 'periodos';
        $datos = Periodo::paginate(5);
        return view('periodos.index', compact('datos', 'ruta_base'));
    }
    public function show($periodo){
        $ruta_base = 'periodos';
        $datos = Periodo::where('periodo','like','%'.$periodo.'%')->paginate(5);
        return view('periodos.index', compact('datos', 'ruta_base'));
    }
    public function edit(Periodo $periodo){
        $ruta_base = 'periodos';
        $dato = $periodo;
        $datos = Periodo::paginate(5);
        return view('periodos.form', compact('datos', 'ruta_base','dato'));
    }
    public function create(){
        $ruta_base = 'periodos';
        $dato = new Periodo();
        $datos = Periodo::paginate(5);
        return view('periodos.form', compact('datos', 'ruta_base','dato'));
    }
    public function update(Request $request,Periodo $periodo){
        $request->validate([
        'fechaIni' => 'before_or_equal:fechaFin',
        ]);
        $periodo->update($request->all());
        return redirect()->route('periodos.index')->with('status','El periodo se ha actualizado');
    }
    public function store(Request $request){
        $request->validate([
            'fechaIni' => 'before_or_equal:fechaFin',
            ]);
            Periodo::create($request->all());
            return redirect()->route('periodos.index')->with('status','El periodo se ha creado');
    }
}
