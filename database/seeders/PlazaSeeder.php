<?php

namespace Database\Seeders;

use App\Models\Plaza;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlazaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plazas = [
            ['idPlaza' => 'E3817', 'nombrePlaza' => 'Plaza Ejecutiva 3817'],
            ['idPlaza' => 'E3815', 'nombrePlaza' => 'Plaza Ejecutiva 3815'],
            ['idPlaza' => 'E3717', 'nombrePlaza' => 'Plaza Ejecutiva 3717'],
            ['idPlaza' => 'E3617', 'nombrePlaza' => 'Plaza Ejecutiva 3617'],
            ['idPlaza' => 'E3520', 'nombrePlaza' => 'Plaza Ejecutiva 3520'],
        ];

        foreach ($plazas as $plaza) {
            Plaza::create($plaza);
        }
    }
}
