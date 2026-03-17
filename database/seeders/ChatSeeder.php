<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Chat;

class ChatSeeder extends Seeder
{
    public function run(): void
    {
        // Asegúrate de que exista un usuario 1 en la tabla users
        Chat::create([
            'nombre' => 'Sala Principal',
            'activo' => true,
            'user_id' => 1,
        ]);
    }
}
