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
        Schema::create('materia_abiertas', function (Blueprint $table) {
            $table->id();
            $table->string('idMateria',10);
            $table->foreign('idMateria')->references('idMateria')->on('materias');
            $table->string('idPeriodo',5);
            $table->foreign('idPeriodo')->references('idPeriodo')->on('periodos');
            $table->string('idCarrera',15);
            $table->foreign('idCarrera')->references('idCarrera')->on('carreras');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materia_abiertas');
    }
};
