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
        Schema::create('alumno_materias', function (Blueprint $table) {
            $table->id();
            $table->string('noctrl',15);
            $table->foreign('noctrl')->references('noctrl')->on('alumnos');
            $table->string('idMateria',10);
            $table->foreign('idMateria')->references('idMateria')->on('materias');
            $table->unsignedSmallInteger('vecesCursadas')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumno_materias');
    }
};
