<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call([
            AnggaranSeeder::class,
            RealisasiSeeder::class,
            FileSeeder::class,
            UserSeeder::class,
        ]);
    }
}
