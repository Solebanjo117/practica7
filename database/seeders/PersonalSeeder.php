<?php

namespace Database\Seeders;

use App\Models\Depto;
use App\Models\Personal;
use App\Models\Puesto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PersonalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
       foreach(Depto::all() as $depto){
        Personal::create(['noTrabajador'=>fake()->bothify('####'),'RFC'=>fake()->bothify('####??##')
    ,'nombres'=>fake()->name(),'apellidoPaterno'=>fake()->lastName(),'idDepto'=>$depto->idDepto,'idPuesto'=>Puesto::first()->idPuesto,
'fechaIngSep'=>fake()->date(),'fechaIngIns'=>fake()->date(),'licenciatura'=>'y']);
       }
    }
}
