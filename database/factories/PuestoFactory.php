<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Puesto>
 */
class PuestoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           'idPuesto'=>fake()->unique()->bothify('???###'),
           'nombre'=>fake()->unique()->name(),
           'tipo'=>fake()->unique()->jobTitle(),
        ];
    }
}