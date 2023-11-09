<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(KodeSuratSeeder::class);
        $this->call(InstansiSeeder::class);
        $this->call(PekerjaanSeeder::class);
        $this->call(OperationalSeeder::class);
    }
}
