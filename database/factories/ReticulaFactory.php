<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reticula>
 */
class ReticulaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'idReticula' =>fake()->unique()->bothify(str_repeat('?',12)),
            'descripcion' =>fake()->jobTitle(),
            'fechaEnVigor'=>fake()->date('Y-m-d'),
        ];
    }
}
