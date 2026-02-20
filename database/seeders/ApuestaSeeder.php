<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Apuesta;
use Carbon\Carbon;

class ApuestaSeeder extends Seeder
{
    public function run(): void
    {
        Apuesta::create([
            'user_id' => 1,
            'juego_id' => 1,
            'monto' => 50.00,
            'cuota' => 2.5,
            'estado' => 'pendiente', // <--- IMPORTANTE: minúsculas
            'fecha' => Carbon::now()
        ]);
    }
}
