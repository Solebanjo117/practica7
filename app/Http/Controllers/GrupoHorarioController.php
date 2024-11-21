<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\Depto;
use App\Models\Edificio;
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
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        session()->flush();
        return redirect()->route('asignarGrupo.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($grupoHorario,$id2,$id3)
    {
        session()->put('semestre', $grupoHorario);
        session()->put('depto', Depto::where('idDepto',$id2)->first());
        session()->put('edificio', Edificio::where('id',$id3)->first());
        session()->put('materias',MateriaAbierta::whereHas('materia', function($q) use($grupoHorario){
            $q->where('semestre', $grupoHorario);
        })->get());
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
    public function destroy(GrupoHorario $grupoHorario)
    {
        //
    }
}
