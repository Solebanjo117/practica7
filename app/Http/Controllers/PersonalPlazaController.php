<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use App\Models\Plaza;
use Illuminate\Http\Request;
use App\Models\PersonalPlaza;

class PersonalPlazaController extends Controller
{
    public function index(){
        $ruta_base='personalplazas';
        $datos = PersonalPlaza::with(['plaza','personal'])->paginate(5);
        return view('personalplazas.index',compact('ruta_base','datos'));
    }
    public function create(){
        $ruta_base='personalplazas';
        $plazas = Plaza::all();
        $personales = Personal::all();
        $dato = new PersonalPlaza();
        $datos = PersonalPlaza::with(['plaza','personal'])->paginate(5);
        return view('personalplazas.form',compact('ruta_base','datos','dato','plazas','personales'));
    }
    public function store(Request $request){

        PersonalPlaza::create($request->all());
        return redirect()->route('personalplazas.index')->with('status','La plaza personal se a creado');
    }
    public function edit($personalPlaza){
        $ruta_base='personalplazas';
        $plazas = Plaza::all();
        $personales = Personal::all();
        $dato = PersonalPlaza::find($personalPlaza);
        $datos = PersonalPlaza::with(['plaza','personal'])->paginate(5);
        return view('personalplazas.form',compact('ruta_base','datos','dato','plazas','personales'));

    }
    public function update(Request $request, $personalPlaza){
        PersonalPlaza::find($personalPlaza)->update($request->all());
        return redirect()->route('personalplazas.index')->with('status','La plaza personal se
        ha actualizado');
    }
    public function destroy($personalPlaza){
        PersonalPlaza::destroy($personalPlaza);
        return redirect()->route('personalplazas.index')->with('status','La plaza personal se
        ha eliminado');}
}
