<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscripcionesTable extends Migration
{
    public function up()
    {
        Schema::create('inscripciones', function (Blueprint $table) {
            $table->id();
            $table->string('alumno_id',15);  // Relación con la tabla 'alumnos'
            $table->string('periodo_id',15); // Relación con la tabla 'periodos'
            $table->string('semestre');  // Campo para indicar el semestre
            $table->enum('estado', ['inscrito', 'reinscrito', 'cancelado'])->default('inscrito');
            $table->timestamps();

            // Definir las claves foráneas
            $table->foreign('alumno_id')->references('noctrl')->on('alumnos')->onDelete('cascade');
            $table->foreign('periodo_id')->references('idPeriodo')->on('periodos')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('inscripciones');
    }
}
