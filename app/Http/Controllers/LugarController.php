<?php

namespace App\Http\Controllers;

use App\Models\Edificio;
use App\Models\Lugar;
use Illuminate\Http\Request;

class LugarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ruta_base = 'lugares';
        $datos = Lugar::with('edificio')->paginate(5);
        return view($ruta_base . '.index', compact('datos','ruta_base'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ruta_base = 'lugares';
        $edificios = Edificio::all();
        $dato = new Lugar();
        $datos = Lugar::paginate(5);
        return view($ruta_base . '.form', compact('datos','ruta_base','dato','edificios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Lugar::create($request->all());
        return redirect()->route('lugares.index')->with('status','se ha creado el lugar');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lugar $lugar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $lugar)
    {
        $ruta_base = 'lugares';
        $edificios = Edificio::all();
        $dato = Lugar::find($lugar);
        $datos = Lugar::paginate(5);
        return view($ruta_base . '.form', compact('datos','ruta_base','dato','edificios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lugar $lugar)
    {
        $lugar->update($request->all());
        return redirect()->route('lugares.index')->with('status','se ha actualizado el lugar
        ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lugar $lugar)
    {
        $lugar->delete();
        return redirect()->route('lugares.index')->with('status','se ha eliminado el lugar
        ');
    }
}
