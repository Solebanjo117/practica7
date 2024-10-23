<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Depto>
 */
class DeptoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'idDepto'=>fake()->unique()->bothify('###??????'),
            'nombreDepto'=>fake()->unique()->jobTitle(),
            'nombreMediano'=> fake()->text(12),

        ];
    }
}
