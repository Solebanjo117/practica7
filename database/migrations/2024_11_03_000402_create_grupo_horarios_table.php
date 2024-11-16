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
        Schema::create('grupo_horarios', function (Blueprint $table) {
            $table->id();
            $table->string('idGrupo');
            $table->foreign('idGrupo')->references('idGrupo')->on('grupos');
            $table->unsignedBigInteger('idLugar');
            $table->foreign('idLugar')->references('id')->on('lugars');
            $table->tinyInteger('dia');
            $table->time('hora');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grupo_horarios');
    }
};
