<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitasTable extends Migration
{
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->id();
            $table->string('alumno_id');  // Relación con el alumno (noctrl)
            $table->integer('semestre');  // Semestre del alumno
            $table->date('fecha_cita');   // Fecha asignada para la cita
            $table->string('turno')->nullable(); // Turno para la cita (opcional)
            $table->timestamps();

            // Claves foráneas
            $table->foreign('alumno_id')->references('noctrl')->on('alumnos')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('citas');
    }
}
