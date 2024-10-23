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
        Depto::factory(10)->has(
            Carrera::factory(1)->has(
                Reticula::factory(1)->has(
                    Materia::factory(1)
                )
            )
        )->create();
    }
}
