<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            JuegoSeeder::class,
            ChatSeeder::class,
            SettingSeeder::class,
            ParametroGananciaSeeder::class,
            BilleteraSeeder::class,
            RankingSeeder::class,
            ApuestaSeeder::class,
            NotificacionSeeder::class,
            MensajeSeeder::class,
        ]);
    }
}
