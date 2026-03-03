<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Sofía Jugadora',
            'email' => 'sofia@casino.com',
            'password' => Hash::make('password123'),
            'puntos_fidelidad' => 150,
            'nivel_vip' => 2
        ]);

        User::create([
            'name' => 'Carlos Operador',
            'email' => 'carlos@casino.com',
            'password' => Hash::make('password123'),
            'puntos_fidelidad' => 0,
            'nivel_vip' => 0
        ]);
    }
}
