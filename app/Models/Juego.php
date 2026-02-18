<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('juegos', function (Blueprint $table) {

            $table->id();
            $table->string('nombre');
            $table->string('categoria');

            $table->enum('estado', [
                'abierta',
                'cerrada',
                'en_juego'
            ])->default('abierta');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('juegos');
    }
};
