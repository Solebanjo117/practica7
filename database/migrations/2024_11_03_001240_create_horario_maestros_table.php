<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('horario_maestros', function (Blueprint $table) {
            $table->id();
            $table->string('noTrabajador',4);
            $table->foreign('noTrabajador')->references('noTrabajador')->on('personals');
            $table->string('idPeriodo',5);
            $table->foreign('idPeriodo')->references('idPeriodo')->on('periodos');
            $table->date('fecha');
            $table->string('observaciones');
            //$table->string('idDirector');
            //idk a q campo se va a referir
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horario_maestros');
    }
};
