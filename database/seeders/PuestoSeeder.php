<?php

namespace Database\Seeders;

use App\Models\Puesto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PuestoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $puestos = [
            ['idPuesto' => 'DOC001', 'nombre' => 'Docente 1', 'tipo' => 'Docente'],
            ['idPuesto' => 'DOC002', 'nombre' => 'Docente 2', 'tipo' => 'Docente'],
            ['idPuesto' => 'DOC003', 'nombre' => 'Docente 3', 'tipo' => 'Docente'],
            
            ['idPuesto' => 'DIR001', 'nombre' => 'Director 1', 'tipo' => 'Dirección'],
            ['idPuesto' => 'DIR002', 'nombre' => 'Director 2', 'tipo' => 'Dirección'],
            ['idPuesto' => 'DIR003', 'nombre' => 'Director 3', 'tipo' => 'Dirección'],
            
            ['idPuesto' => 'NOD001', 'nombre' => 'No Docente 1', 'tipo' => 'No Docente'],
            ['idPuesto' => 'NOD002', 'nombre' => 'No Docente 2', 'tipo' => 'No Docente'],
            ['idPuesto' => 'NOD003', 'nombre' => 'No Docente 3', 'tipo' => 'No Docente'],
            
            ['idPuesto' => 'AUX001', 'nombre' => 'Auxiliar 1', 'tipo' => 'Auxiliar'],
            ['idPuesto' => 'AUX002', 'nombre' => 'Auxiliar 2', 'tipo' => 'Auxiliar'],
            ['idPuesto' => 'AUX003', 'nombre' => 'Auxiliar 3', 'tipo' => 'Auxiliar'],
            
            ['idPuesto' => 'ADM001', 'nombre' => 'Administrativo 1', 'tipo' => 'Administrativo'],
            ['idPuesto' => 'ADM002', 'nombre' => 'Administrativo 2', 'tipo' => 'Administrativo'],
            ['idPuesto' => 'ADM003', 'nombre' => 'Administrativo 3', 'tipo' => 'Administrativo']
        ];

        foreach ($puestos as $puesto) {
            Puesto::create($puesto);
        }
    }
}
