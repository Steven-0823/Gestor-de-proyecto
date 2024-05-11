<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('_proyectos', function (Blueprint $table) {
        $table->decimal('PresupuestoUsado', 10, 2)->nullable()->default(0)->change();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down()
{
    Schema::table('_proyectos', function (Blueprint $table) {
        $table->decimal('PresupuestoUsado', 10, 2)->nullable(false)->change();
    });
}

};
