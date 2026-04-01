<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ParametroGanancia;

class ParametroGananciaSeeder extends Seeder
{
    public function run(): void
    {
        ParametroGanancia::query()->delete();

        ParametroGanancia::create([
            'multiplicacion_por_juego' => 1.50,
            'bonus_por_racha' => 2.00,
        ]);

        ParametroGanancia::create([
            'multiplicacion_por_juego' => 2.25,
            'bonus_por_racha' => 3.50,
        ]);
    }
}
