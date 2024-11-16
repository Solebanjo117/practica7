<?php

namespace Database\Seeders;

use App\Models\Periodo;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeriodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $periodos = [
            [
                'idPeriodo' => 'E23-1', 
                'periodo' => 'Enero-Junio 2023', 
                'descCorta' => 'Ene-Jun 23', 
                'fechaIni' => Carbon::create(2023, 1, 1), 
                'fechaFin' => Carbon::create(2023, 6, 30)
            ],
            [
                'idPeriodo' => 'A23-2', 
                'periodo' => 'Agosto-Diciembre 2023', 
                'descCorta' => 'Ago-Dic 23', 
                'fechaIni' => Carbon::create(2023, 8, 1), 
                'fechaFin' => Carbon::create(2023, 12, 31)
            ],
            [
                'idPeriodo' => 'E24-1', 
                'periodo' => 'Enero-Junio 2024', 
                'descCorta' => 'Ene-Jun 24', 
                'fechaIni' => Carbon::create(2024, 1, 1), 
                'fechaFin' => Carbon::create(2024, 6, 30)
            ],
            [
                'idPeriodo' => 'A24-2', 
                'periodo' => 'Agosto-Diciembre 2024', 
                'descCorta' => 'Ago-Dic 24', 
                'fechaIni' => Carbon::create(2024, 8, 1), 
                'fechaFin' => Carbon::create(2024, 12, 31)
            ]
        ];

        foreach ($periodos as $periodo) {
            Periodo::create($periodo);
        }
    }
}
