<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Mensaje;

class MensajeSeeder extends Seeder
{
    public function run(): void
    {
        Mensaje::create([
            'chat_id' => 1,
            'emisor_id' => 1,
            'receptor_id' => 2,
            'contenido' => '¡Hola! ¿Cuánto es la apuesta mínima?',
            'editado' => false
        ]);
    }
}
