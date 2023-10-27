<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        Role::create(['name' => 'Super Admin']);

        User::factory()->create([
            'username' => 'dev',
            'password' => hash::make('dev'),
            'name' => 'DEVELOPMENT',
            'email' => 'dev@gmail.com',
        ])->assignRole('Super Admin');



    }
}
