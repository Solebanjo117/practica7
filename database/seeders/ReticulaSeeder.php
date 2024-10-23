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
        Depto::factory(3)->has(
            Carrera::factory(3)->has(
            Reticula::factory(5)
         )
        )->create();
        
    }
}
