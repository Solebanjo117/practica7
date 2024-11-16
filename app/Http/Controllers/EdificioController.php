<?php

namespace App\Http\Controllers;

use App\Models\Edificio;
use Illuminate\Http\Request;

class EdificioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $ruta_base= 'edificios';
       $datos = Edificio::paginate(5);
       return view('edificios.index', compact('datos', 'ruta_base'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ruta_base= 'edificios';
        $dato = new Edificio();
       $datos = Edificio::paginate(5);
       return view('edificios.form', compact('datos', 'ruta_base','dato'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Edificio::create($request->all());
        return redirect()->route('edificios.index')->with('status','El edificio se ha insertado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Edificio $edificio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Edificio $edificio)
    {
        $ruta_base= 'edificios';
        $dato = $edificio;
       $datos = Edificio::paginate(5);
       return view('edificios.form', compact('datos', 'ruta_base','dato'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Edificio $edificio)
    {
        $edificio->update($request->all());
        return redirect()->route('edificios.index')->with('status','El edificio se ha
        actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Edificio $edificio)
    {

        $edificio->delete();
        return redirect()->route('edificios.index')->with('status','El edificio se ha
        eliminado');
    }
}
