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
        Schema::create('carreras', function (Blueprint $table) {
            $table->string('idCarrera',15)->primary();
            $table->string('nombreCarrera',200)->nullable();
            $table->string('nombreMediano',50)->nullable();
            $table->string('nombreCorto',5)->nullable();
            $table->string('idDepto',20);
            $table->foreign('idDepto')->references('idDepto')->on('deptos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carreras');
    }
};
