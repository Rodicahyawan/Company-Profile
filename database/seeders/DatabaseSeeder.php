<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Memanggil seeder untuk tabel sessions
        $this->call([
            UserSeeder::class,
            LayananSeeder::class,
            AntreanSeeder::class,
            SessionsSeeder::class,
            TentangSeeder::class,
            GaleriSeeder::class,

        ]);
    }
}
