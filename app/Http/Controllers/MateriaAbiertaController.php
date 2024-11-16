<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\MateriaAbierta;
use App\Models\Periodo;
use Illuminate\Http\Request;

class MateriaAbiertaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $periodos = Periodo::all();
        $carreras = Carrera::all();

        return view ('materiasAbiertas',compact('periodos','carreras'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(MateriaAbierta $materiaAbierta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MateriaAbierta $materiaAbierta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MateriaAbierta $materiaAbierta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MateriaAbierta $materiaAbierta)
    {
        //
    }
}
