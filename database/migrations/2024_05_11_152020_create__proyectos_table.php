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
        Schema::create('_proyectos', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre');
            $table->unsignedBigInteger('IdLider');
            $table->decimal('Presupuesto', 10, 2);
            $table->decimal('PresupuestoUsado', 10, 2);
            $table->string('estado');
            $table->decimal('PorcentajeAvance', 5, 2);
            $table->timestamps();

            // Definir la clave foránea para el líder del proyecto
            $table->foreign('IdLider')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_proyectos');
    }
};
