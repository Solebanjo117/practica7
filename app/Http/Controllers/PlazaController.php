<?php

namespace App\Http\Controllers;

use App\Models\Plaza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class PlazaController extends Controller
{
    public function index(){
        $datos = Plaza::paginate(5);
        $columnas = Schema::getColumnListing("plazas");
        $columnas_omitidas = ['created_at', 'updated_at'];
        $ruta_base='plazas';
        return view("plazas.index",compact('datos','columnas','columnas_omitidas','ruta_base'));
    }
    public function create(){
        $datos = Plaza::paginate(5);
        $columnas = Schema::getColumnListing("plazas");
        $columnas_omitidas = ['created_at', 'updated_at'];
        $dato = new Plaza();
        $ruta_base='plazas';
        return view("plazas.form",compact('datos','columnas','columnas_omitidas','ruta_base','dato'));
    }
    public function store(Request $request){
        Plaza::create($request->all());
        return redirect()->route('plazas.index')->with('status','El alumno se ha insertado correctamente');
    }
    public function edit(Plaza $plaza){
        $datos = Plaza::paginate(5); //msotrar tabla
        $columnas = Schema::getColumnListing("plazas"); //mostrar columnas automaticamente
        $columnas_omitidas = ['created_at', 'updated_at']; // no mostrar columnas como created_at
        $dato = $plaza; //dato a colocar en formulario
        $ruta_base='plazas'; //ruta dinamica
        return view("plazas.form",compact('datos','columnas','columnas_omitidas','ruta_base','dato'));
    }
    public function update(Request $request, Plaza $plaza){
        $plaza->update($request->all());
        return redirect()->route('plazas.index')->with('status','La plaza se ha modificado');
     }
     public function destroy(Plaza $plaza){
        $plaza->delete();
        return redirect()->route('plazas.index')->with('status',
        'La plaza se ha eliminado correctamente');
     }
     public function show($plaza){
        $datos = Plaza::where('nombrePlaza','like','%'.$plaza.'%')->paginate(5);
        $columnas = Schema::getColumnListing("plazas");
        $columnas_omitidas = ['created_at', 'updated_at'];
        $ruta_base='plazas';
        return view("plazas.index",compact('datos','columnas','columnas_omitidas','ruta_base'));
    }
}
