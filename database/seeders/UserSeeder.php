<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //php artisan serve
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'manager']);
        Role::create(['name' => 'engineer']);

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
