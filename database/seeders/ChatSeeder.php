<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Chat;

class ChatSeeder extends Seeder
{
    public function run(): void
    {
        Chat::query()->delete();

        Chat::create([
            'nombre' => 'Sala Principal',
            'fechaCreacion' => '2026-04-01',
            'activo' => true,
        ]);

        Chat::create([
            'nombre' => 'Apuestas en Vivo',
            'fechaCreacion' => '2026-04-02',
            'activo' => true,
        ]);

        Chat::create([
            'nombre' => 'Archivo General',
            'fechaCreacion' => '2026-03-20',
            'activo' => false,
        ]);
    }
}
