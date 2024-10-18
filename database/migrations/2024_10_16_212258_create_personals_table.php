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
        Schema::create('personals', function (Blueprint $table) {
            $table->string('noTrabajador',4)->primary();
            $table->string('RFC',13)->index();
            $table->string('nombres',50);
            $table->string('apellidoPaterno',50);
            $table->string('apellidoMaterno',50)->nullable();
            $table->string('licenciatura',200);

            $table->char('licPasTit')->nullable();

            $table->string('especializacion',200)->nullable();
            $table->char('espPasTit')->nullable();

            $table->string('maestria',200)->nullable();
            $table->char('maePasTit')->nullable();

            $table->string('doctorado',200)->nullable();
            $table->char('docPasTit')->nullable();

            $table->string('idDepto',20);
            $table->foreign('idDepto')->references('idDepto')->on('deptos');

            $table->date('fechaIngSep');
            $table->date('fechaIngIns');

            $table->string('idPuesto');
            $table->foreign('idPuesto')->references('idPuesto')->on('puestos');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personals');
    }
};
