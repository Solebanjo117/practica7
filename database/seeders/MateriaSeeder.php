<?php

namespace Database\Seeders;

use App\Models\Depto;
use App\Models\Carrera;
use App\Models\Materia;
use App\Models\Reticula;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MateriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reticulaISC = Reticula::where('descripcion', 'like', '%Sistemas Computacionales%')->first();
        $reticulaIndustrial = Reticula::where('descripcion', 'like', '%Industrial%')->first();

        // Tres materias por semestre para ISC
        foreach (range(1, 8) as $semestre) {
            for ($i = 1; $i <= 3; $i++) {
                Materia::create([
                    'idMateria'=>fake()->bothify('###-###'),
                    'nombreMateria' => "Materia ISC Semestre $semestre - $i",
                    'idReticula' => $reticulaISC->idReticula
                ]);
            }
        }

        // Dos materias por semestre para Industrial
        foreach (range(1, 8) as $semestre) {
            for ($i = 1; $i <= 2; $i++) {
                Materia::create([
                    'nombreMateria' => "Materia Industrial Semestre $semestre - $i",
                    'idMateria'=>fake()->bothify('###-###'),
                    'idReticula' => $reticulaIndustrial->idReticula
                ]);
            }
        }
    }
}
