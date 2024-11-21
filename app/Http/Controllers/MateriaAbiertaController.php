<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\Periodo;
use Illuminate\Http\Request;
use App\Models\MateriaAbierta;



class MateriaAbiertaController extends Controller
{

    public $carrera;
    public $ma;
    public $periodo_id;
    public $carrera_id;

    function __construct()
    {
        if (request()->idPeriodo) {
            $this->periodo_id = request()->idPeriodo;
            session(['periodo_id' => request()->idPeriodo]);
        } else {
            $this->periodo_id = (session()->exists('periodo_id') ? session('periodo_id') : "-1");
        }

        if (request()->idCarrera) {
            $this->carrera_id = request()->idCarrera;
            session(['carrera_id' => request()->idCarrera]);
        } else{
            $this->carrera_id = (session()->exists('carrera_id') ? session('carrera_id') : "-1");
        }

        $this->carrera = Carrera::with("reticulas.materias")->where('idCarrera', $this->carrera_id)->get();

        $this->ma = MateriaAbierta::where('idPeriodo', $this->periodo_id)
            ->where('idCarrera', $this->carrera_id)
            ->get();
    }    

    public function index()
    {
        // return request()->all();
        $periodos = Periodo::get();
        $carreras = Carrera::get();
        return view("materiasAbiertas",
                                    ['periodos'=>$periodos,
                                    'carreras'=>$carreras,
                                    'carrera'=>$this->carrera,
                                    'ma'=>$this->ma
                                    ]);
    }

    public function store(Request $request)
    {
        foreach ($request->all() as $key => $value) {
            if (substr($key, 0, 1) == 'm') {
                $existe = $this->ma->firstWhere('idMateria', $request->$key);
                if (is_null($existe) and $this->periodo_id != "-1" and $this->carrera_id != "-1") {
                    MateriaAbierta::create([
                        'idPeriodo' => $this->periodo_id,
                        'idCarrera' => $this->carrera_id,
                        'idMateria' => $value
                    ]);
                }
            }

            //return request()->eliminar; 
            if (request()->eliminar and request()->eliminar !="NOELIMINAR"){
                //return "entro";
                $existe = MateriaAbierta::where('idMateria', $request->eliminar)
                                    ->where('idPeriodo',$this->periodo_id)
                                    ->delete();
                return redirect()->route('materiasA.index');        
            }
        }
        return redirect()->route('materiasA.index');
    }

}
