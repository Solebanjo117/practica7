<?php

namespace Database\Seeders;

use App\Models\Alumno;
use App\Models\Carrera;
use App\Models\Depto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlumnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $carreras = Carrera::take(4)->get();
        
        foreach ($carreras as $carrera) {
            foreach (range(1, 5) as $i) {
                Alumno::create([
                    'nombreAlumno' => "Alumno {$carrera->nombreCarrera} $i",
                    'apellidoPaterno'=>fake()->lastName(),
                    'sexo'=>fake()->randomElement(['H','M']),
                    'noctrl'=>fake()->randomNumber(9),
                    'idCarrera' => $carrera->idCarrera,
                ]);
            }
        }
    }
}
