<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Materia>
 */
class MateriaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           'idMateria'=>fake()->unique()->bothify('???-?#?#'),
           'nombreMateria'=>fake()->jobTitle(),
           'nivel'=>fake()->randomElement(['I','D','E']),
            'nombreMediano'=>fake()->name(),
            'modalidad'=>fake()->randomElement(['L','P'])
        ];
    }
}
