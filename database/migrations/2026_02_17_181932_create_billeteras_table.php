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
        Schema::create('billeteras', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('billeteras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jugador_id')->constrained()->cascadeOnDelete();
            $table->double('saldoDisponible')->default(0);
            $table->string('moneda')->default('EUR');
            $table->timestamps();
        });
    }
};
