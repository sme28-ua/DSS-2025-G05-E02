<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Apuesta;
use App\Models\User;
use App\Models\Juego;

class ApuestaSeeder extends Seeder
{
    public function run(): void
    {
        Apuesta::query()->delete();

        $user1 = User::first();
        $user2 = User::skip(1)->first() ?? $user1;

        $juego1 = Juego::first();
        $juego2 = Juego::skip(1)->first() ?? $juego1;

        if (!$user1 || !$juego1) {
            return;
        }

        Apuesta::create([
            'user_id' => $user1->id,
            'juego_id' => $juego1->id,
            'monto' => 50,
            'cuota' => 2.5,
            'estado' => 'pendiente',
            'fecha' => now(),
        ]);

        Apuesta::create([
            'user_id' => $user2->id,
            'juego_id' => $juego2->id,
            'monto' => 100,
            'cuota' => 1.8,
            'estado' => 'ganada',
            'fecha' => now()->subDay(),
        ]);
    }
}
