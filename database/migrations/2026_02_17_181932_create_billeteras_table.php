<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('billeteras', function (Blueprint $table) {

            $table->id();

            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            // dinero SIEMPRE decimal
            $table->decimal('saldoDisponible', 12, 2)->default(0);

            $table->string('moneda')->default('EUR');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('billeteras');
    }
};
