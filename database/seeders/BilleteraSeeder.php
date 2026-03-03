<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Billetera;

class BilleteraSeeder extends Seeder
{
    public function run(): void
    {
        // Asignamos billeteras usando los IDs de los usuarios recién creados (1 y 2)
        Billetera::create([
            'user_id' => 1,
            'saldoDisponible' => 500.50,
            'moneda' => 'EUR'
        ]);

        Billetera::create([
            'user_id' => 2,
            'saldoDisponible' => 10000.00,
            'moneda' => 'EUR'
        ]);
    }
}
