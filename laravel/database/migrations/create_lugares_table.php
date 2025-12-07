<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Solo verificar que la tabla existe, no crearla
        if (!Schema::hasTable('Lugares')) {
            Schema::create('Lugares', function (Blueprint $table) {
                $table->id();
                $table->string('nombre', 100);
                $table->string('direccion', 200);
                $table->timestamps();
            });
        }
    }

    public function down()
    {
        // No eliminar la tabla si ya existe
        // Schema::dropIfExists('Lugares');
    }
};