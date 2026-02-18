<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mensajes', function (Blueprint $table) {

            $table->id();

            $table->foreignId('chat_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('emisor_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->foreignId('receptor_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->text('contenido');

            $table->boolean('editado')->default(false);

            $table->timestamps();
        });
    }

    public function receptor(){
        return $this->belongsTo(User::class, 'receptor_id');
    }
}

