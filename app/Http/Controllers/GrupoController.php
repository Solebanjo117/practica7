<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
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
        $request->validate(['idPeriodo' => 'not_in:-1']);
       $dato= Grupo::updateOrCreate(['nombreGrupo' => $request->input('grupo')],
        ['maxAlumnos'=> $request->input('max_alumnos'),'descripcionGrupo' => $request->input('desc'),
        'idPeriodo'=>
        $request->input('idPeriodo'),]
    );
    $mensaje = $dato->wasRecentlyCreated? 'El grupo fue creado con éxito.':'El grupo fue actualizado con éxito.';
    session()->put('grupo',$dato);
        return redirect()->route('asignarGrupo.index')->with('status',$mensaje);
    }

    /**
     * Display the specified resource.
     */
    public function show(Grupo $grupo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grupo $grupo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Grupo $grupo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Grupo $grupo)
    {
        //
    }
}
