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
        Role::create(['name' => 'super-admin']);
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'manager']);
        Role::create(['name' => 'engineer']);

        User::factory()->create([
            'username' => 'dev',
            'password' => hash::make('dev'),
            'name' => 'DEVELOPMENT',
            'email' => 'dev@gmail.com'
        ])->assignRole('super-admin');

        User::factory()->create([
            'username' => 'admin',
            'password' => hash::make('admin'),
            'name' => 'admin',
            'email' => 'admin@gmail.com',
        ])->assignRole('admin');

        User::factory()->create([
            'username' => 'manager',
            'password' => hash::make('manager'),
            'name' => 'manager',
            'email' => 'manager@gmail.com',
        ])->assignRole('manager');

        User::factory()->create([
            'username' => 'engineer',
            'password' => hash::make('engineer'),
            'name' => 'engineer',
            'email' => 'engineer@gmail.com',
        ])->assignRole('engineer');
        
    }
}
