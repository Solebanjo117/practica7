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
        Schema::create('personal_plazas', function (Blueprint $table) {
            $table->id('idPlazaPersonal');
            $table->integer('tipoNombramiento')->nullable();
            $table->string('idPlaza',25);
            $table->foreign('idPlaza')->references('idPlaza')->on('plazas');
            $table->string('RFC',13);
            $table->foreign('RFC')->references('RFC')->on('personals');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_plazas');
    }
};
