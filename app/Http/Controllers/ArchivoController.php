<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Archivo;
use Illuminate\Http\Request;

class ArchivoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alumnos = Alumno::all();
        return view('docs.subir',compact('alumnos'));
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
        $request->validate([
            'alumno_id' => 'required|exists:alumnos,noctrl',
            'pago_pdf' => 'required|mimes:pdf|max:10240',  // Limitar a 10MB
            'identificacion_pdf' => 'required|mimes:pdf|max:10240',  // Limitar a 10MB
        ]);
        $pagoPdf = $request->file('pago_pdf')->store('pdfs', 'public');
        $identificacionPdf = $request->file('identificacion_pdf')->store('pdfs', 'public');
        Archivo::create([
            'noctrl' => $request->alumno_id,
            'pago_pdf' => $pagoPdf,
            'identificacion_pdf' => $identificacionPdf,
            'verificado' => false,  // Se establece como no verificado por defecto
        ]);

        return redirect()->route('archivos.index')->with('success', 'Archivos subidos correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($archivo)
    {
        $archivo = "%$archivo%";
        $alumnos = Alumno::where('nombreAlumno','like',$archivo)
        ->orWhere('noctrl',$archivo)->orWhere('apellidoPaterno','like',$archivo)->get();
        return view('docs.subir',compact('alumnos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Archivo $archivo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Archivo $archivo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Archivo $archivo)
    {
        //
    }
    public function verArchivos()
    {
        // Buscar los archivos subidos por el alumno
        $alumnosConArchivos = Alumno::whereHas('archivos') // Verifica si hay archivos relacionados con el alumno
        ->paginate(5);

        // Pasar los archivos y el noctrl del alumno a la vista
        return view('docs.ver', compact('alumnosConArchivos'));
    }
}
