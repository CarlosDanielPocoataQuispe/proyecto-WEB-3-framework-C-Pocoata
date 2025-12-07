<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('asistentes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('evento_id')->constrained('eventos');
            $table->string('nombre', 100);
            $table->string('contacto', 100);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('asistentes');
    }
};