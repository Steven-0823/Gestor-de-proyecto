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
        Schema::create('_paquetes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Idproyecto');
            $table->string('titulo');
            $table->text('descripcion')->nullable();
            $table->string('tipo')->nullable();
            $table->string('estado')->nullable();
            $table->unsignedBigInteger('IdEncargado');
            $table->timestamps();

            $table->foreign('Idproyecto')->references('id')->on('_proyectos');
            $table->foreign('IdEncargado')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_paquetes');
    }
};
