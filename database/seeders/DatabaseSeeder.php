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
        $this->call(InstansiSeeder::class);
        $this->call(KodeSuratSeeder::class);
        $this->call(ProyekSeeder::class);
        $this->call(WorkOrderSeeder::class);
        $this->call(MatSeeder::class);
        $this->call(OperationalReqSeeder::class);
        $this->call(PersuratanSeeder::class);
        $this->call(PurchaseReqSeeder::class);
        $this->call(QcPassSeeder::class);
    }
}
