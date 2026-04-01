<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Juego;

class JuegoSeeder extends Seeder
{
    public function run(): void
    {
        Juego::query()->delete();

        Juego::create([
            'nombre' => 'Ruleta Europea',
            'categoria' => 'Mesa',
            'estado' => 'abierta',
        ]);

        Juego::create([
            'nombre' => 'Blackjack Clásico',
            'categoria' => 'Cartas',
            'estado' => 'en_juego',
        ]);

        Juego::create([
            'nombre' => 'Tragaperras Deluxe',
            'categoria' => 'Slots',
            'estado' => 'cerrada',
        ]);
    }
}
