<?php

namespace Database\Seeders;

use App\Models\Alumno;
use App\Models\Carrera;
use App\Models\Depto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarreraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $carreras = [
            ['idCarrera' => 'ISC123', 'nombre' => 'Ingeniería en Sistemas Computacionales', 'depto' => 'ISC'],
            ['idCarrera' => 'II123', 'nombre' => 'Ingeniería Industrial', 'depto' => 'IE'],
            ['idCarrera' => 'IM123', 'nombre' => 'Ingeniería Mecánica', 'depto' => 'IM'],
            ['idCarrera' => 'IE123', 'nombre' => 'Ingeniería Electrónica', 'depto' => 'IME'],
            ['idCarrera' => 'CP123', 'nombre' => 'Contador Público', 'depto' => 'CP'],
            ['idCarrera' => 'IGE123', 'nombre' => 'Ingeniería en Gestión Empresarial', 'depto' => 'IGE'],
            ['idCarrera' => 'IME123', 'nombre' => 'Ingeniería Eléctrica', 'depto' => 'II'],
        ];

        foreach ($carreras as $carrera) {
            $depto = Depto::where('nombreDepto', $carrera['depto'])->first();

            Carrera::create([
                'idCarrera' => $carrera['idCarrera'],
                'nombreCarrera' => $carrera['nombre'],
                'idDepto' => $depto->idDepto
            ]);
        }
    }
}
