<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Billetera;
use App\Models\User;

class BilleteraSeeder extends Seeder
{
    public function run(): void
    {
        Billetera::query()->delete();

        $user1 = User::first();
        $user2 = User::skip(1)->first() ?? $user1;

        if (!$user1) {
            return;
        }

        Billetera::create([
            'user_id' => $user1->id,
            'saldoDisponible' => 500.50,
            'moneda' => 'EUR',
        ]);

        if ($user2) {
            Billetera::create([
                'user_id' => $user2->id,
                'saldoDisponible' => 1250.00,
                'moneda' => 'USD',
            ]);
        }
    }
}
