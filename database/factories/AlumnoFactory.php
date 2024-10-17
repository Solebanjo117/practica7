<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Alumno>
 */
class AlumnoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
         'noctrl'=>fake()->unique()->bothify('?#######'),
         'nombreAlumno'=>fake()->name(),
         'apellidoPaterno'=>fake()->lastName(),
         'sexo'=>fake()->randomElement(['M','F']),
        ];
    }
}
