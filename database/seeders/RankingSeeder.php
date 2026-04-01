<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ranking;

class RankingSeeder extends Seeder
{
    public function run(): void
    {
        Ranking::query()->delete();

        Ranking::create([
            'user_id' => 1,
            'posicion' => 1,
            'puntos' => 1500,
            'total_ganado' => 4200.50,
        ]);

        Ranking::create([
            'user_id' => 2,
            'posicion' => 2,
            'puntos' => 1200,
            'total_ganado' => 3100.00,
        ]);

        Ranking::create([
            'user_id' => 3,
            'posicion' => 3,
            'puntos' => 950,
            'total_ganado' => 2100.25,
        ]);
    }
}
