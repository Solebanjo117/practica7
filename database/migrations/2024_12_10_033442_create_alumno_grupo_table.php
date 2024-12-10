<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnoGrupoTable extends Migration
{
    public function up()
    {
        Schema::create('alumno_grupo', function (Blueprint $table) {
            $table->id();
            $table->string('alumno_id');
            $table->unsignedBigInteger('grupo_id');

            $table->foreign('alumno_id')->references('noctrl')->on('alumnos'); // Relación con alumnos
            $table->foreign('grupo_id')->references('idGrupo')->on('grupos'); // Relación con grupos
            $table->timestamps(); // Timestamps para seguimiento de creación y actualización
        });
    }

    public function down()
    {
        Schema::dropIfExists('alumno_grupo');
    }
}
