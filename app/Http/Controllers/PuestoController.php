<?php

namespace App\Http\Controllers;

use App\Models\Puesto;
use App\Http\Requests\StorePuestoRequest;
use App\Http\Requests\UpdatePuestoRequest;
use Illuminate\Support\Facades\Schema;

class PuestoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos = Puesto::paginate(5);
        $columnas = Schema::getColumnListing("puestos");
        $columnas_omitidas = ['created_at', 'updated_at'];
        $ruta_base='puestos';
        return view("puestos.index",compact('datos','columnas','columnas_omitidas','ruta_base'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $datos = Puesto::paginate(5);
        $columnas = Schema::getColumnListing("puestos");
        $columnas_omitidas = ['created_at', 'updated_at'];
        $dato = new Puesto();
        $ruta_base='puestos';
        return view("puestos.form",compact('datos','columnas','columnas_omitidas','ruta_base','dato'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePuestoRequest $request)
    {
        Puesto::create($request->all());
        return redirect()->route('puestos.index')->with('status','El alumno se ha insertado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($puesto)
    {
        $datos = Puesto::where('nombre','like','%'.$puesto.'%')->paginate(5);
        $columnas = Schema::getColumnListing("puestos");
        $columnas_omitidas = ['created_at', 'updated_at'];
        $ruta_base='puestos';
        return view("puestos.index",compact('datos','columnas','columnas_omitidas','ruta_base'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Puesto $puesto)
    {
        $datos = Puesto::paginate(5); //msotrar tabla
        $columnas = Schema::getColumnListing("puestos"); //mostrar columnas automaticamente
        $columnas_omitidas = ['created_at', 'updated_at']; // no mostrar columnas como created_at
        $dato = $puesto; //dato a colocar en formulario
        $ruta_base='puestos'; //ruta dinamica
        return view("puestos.form",compact('datos','columnas','columnas_omitidas','ruta_base','dato'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePuestoRequest $request, Puesto $puesto)
    {
        $puesto->update($request->all());
        return redirect()->route('puestos.index')->with('status','El puesto se ha actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Puesto $puesto)
    {
        $puesto->delete();
        return redirect()->route('puestos.index')->with('status','El puesto se ha eliminado');
    }
}
