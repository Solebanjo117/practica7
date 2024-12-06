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
        Schema::create('archivos', function (Blueprint $table) {
            $table->id();
            $table->string('noctrl');  // Relación con la tabla alumnos
            $table->string('pago_pdf');  // Archivo de pago
            $table->string('identificacion_pdf');  // Archivo de identificación
            $table->boolean('verificado')->default(false);  // Campo para verificación por admin
            $table->timestamps();

            // Establecer la relación con la tabla alumnos
            $table->foreign('noctrl')->references('noctrl')->on('alumnos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('archivos');
    }
};
