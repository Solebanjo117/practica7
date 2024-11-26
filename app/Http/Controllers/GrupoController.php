<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use App\Models\GrupoHorario;
use Illuminate\Http\Request;

class GrupoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $request->validate(['idPeriodo' => 'not_in:-1',
                            'max_alumnos'=> 'numeric|min:15',
                        'grupo'=>'min:2']);
       $dato= Grupo::updateOrCreate(['nombreGrupo' => $request->input('grupo')],
        ['maxAlumnos'=> $request->input('max_alumnos'),'descripcionGrupo' => $request->input('desc'),
        'idPeriodo'=>
        $request->input('idPeriodo'),]
    );
    $mensaje = $dato->wasRecentlyCreated? 'El grupo fue creado con éxito.':'El grupo fue actualizado con éxito.';
    session()->put('grupo',$dato);
    session()->put('idCarrera',$request->input('idCarrera'));
        return redirect()->route('asignarGrupo.index')->with('status',$mensaje);
    }

    /**
     * Display the specified resource.
     */
    public function show($grupo)
    {
        
        $grupox= Grupo::where('nombreGrupo',$grupo)->first();
       
        $materias = GrupoHorario::where('idGrupo','=',$grupox->idGrupo)->get();
        return response()->json(['mensaje'=>$materias]);
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grupo $grupo)
    {
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $grupo)
    {
        $grupow = Grupo::where('nombreGrupo',$request->input('idGrupo'))->first();
        $grupow->update(['noTrabajador'=>$grupo]);
        return response()->json(['mensaje'=>'Exito']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Grupo $grupo)
    {
        //
    }
}
