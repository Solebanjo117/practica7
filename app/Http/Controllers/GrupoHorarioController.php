<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\Depto;
use App\Models\Edificio;
use App\Models\Grupo;
use App\Models\GrupoHorario;
use App\Models\Lugar;
use App\Models\MateriaAbierta;
use App\Models\periodo;
use Illuminate\Http\Request;

class GrupoHorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function prueba(){
        $grupos = Grupo::all();
        return response()->json(['mensaje'=> $grupos])->header('Access-Control-Allow-Origin', '*');
    }
    public function index()
    {
        $periodos = periodo::all();
        $carreras= Carrera::all();
        $edificios= Edificio::all();
        $deptos = Depto::all();
        return view('asigngrpo',compact('periodos','carreras','edificios','deptos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        session()->flush();
        return redirect()->route('asignarGrupo.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dia = $request->input('id')[0];
        $hora = str_replace($dia,'',$request->input('id')).":00";
        $grupo = Grupo::where('nombreGrupo',$request->nombreGrupo)->first();
        $grupo->update(['idMateria'=>$request->input('radiomateria')]);
        GrupoHorario::create(['idGrupo'=>$grupo->idGrupo, 'idLugar'
        => $request->input('radiolugar'),'dia' => $dia,'hora'=>$hora
    ]);
    return response()->json(['mensaje' => $grupo->idMateria]);
    }

    /**
     * Display the specified resource.
     */
    public function show($grupoHorario,$id2,$id3,$id4)
    {
        session()->put('semestre', $grupoHorario);
        
        session()->put('idCarrera',$id4);
        session()->put('depto', Depto::where('idDepto',$id2)->with('personals')->first());
        session()->put('edificio', Edificio::where('id',$id3)->with('lugares')->first());
        session()->put('materias',MateriaAbierta::whereHas('materia', function($q) use($grupoHorario){
            $q->where('semestre', $grupoHorario);
        })->where('idCarrera',$id4)->get());
        return redirect()->route('asignarGrupo.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GrupoHorario $grupoHorario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GrupoHorario $grupoHorario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($grupoHorario)
    {
        $letra = $grupoHorario[0];
$numero = substr($grupoHorario, 1).':00:00'; 
$horita =GrupoHorario::where('dia',$letra)->where('hora',$numero)->delete();
        return response()->json(['mensaje'=>'Exito se ha borrado']);
    }
}
