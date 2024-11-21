<?php

namespace Database\Seeders;

use App\Models\Edificio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EdificioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for( $i=0;$i<=10;$i++){
            Edificio::Create(['nombre'=>fake()->name(), 'nombreCorto'=> '']);
        }
    }
}
