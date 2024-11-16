<?php

namespace Database\Seeders;

use App\Models\Carrera;
use App\Models\Depto;
use App\Models\Reticula;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReticulaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $carreras = Carrera::all();

        foreach ($carreras as $carrera) {
            Reticula::create([
                'idReticula'=>fake()->bothify('###?##??#'),
                'descripcion' => 'Retícula ' . $carrera->nombreCarrera,
                'idCarrera' => $carrera->idCarrera
            ]);
        }
        
    }
}
