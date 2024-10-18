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
        Schema::create('horarios', function (Blueprint $table) {
            $table->id('idHorario');
            $table->string('noTrabajador',4);
            $table->foreign('noTrabajador')->references('noTrabajador')->on('personals');
            $table->string('idPeriodo',5);
            $table->foreign('idPeriodo')->references('idPeriodo')->on('periodos');
            $table->date('fecha');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horarios');
    }
};
