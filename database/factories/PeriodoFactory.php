<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Periodo>
 */
class PeriodoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $fechafin = fake()->dateTimeBetween('-1 years')->format('Y-m-d');
        $anio = fake()->randomElement(['24','25']); 
        return [
            'idPeriodo'=>fake()->bothify('#####'),
            'periodo'=>fake()->randomElement(['Ene-Jun','Ago-Dic']).' '.
            fake()->randomElement(['24','25']),
            'fechaIni'=>fake()->date('Y-m-d',$fechafin),
            'fechaFin'=>$fechafin,
        ];
    }
}
