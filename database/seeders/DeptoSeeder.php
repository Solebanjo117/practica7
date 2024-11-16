<?php

namespace Database\Seeders;

use App\Models\Carrera;
use App\Models\Depto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeptoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $deptos = [
            'Direccion', 'Subdireccion', 'ISC', 'IE', 'IM', 
            'IME', 'CP', 'IGE', 'II', 'Ciencias Basicas'
        ];

        foreach ($deptos as $depto) {
            Depto::create(['nombreDepto' => $depto,'idDepto'=>fake()->bothify('###???##')]);
        }
    }
}
