<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

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
            'password' => bcrypt('admin'),
            'name' => 'admin',
            'email' => 'admin@gmail.com',
        ])->assignRole('admin');

        User::factory()->create([
            'username' => 'manager',
            'password' => bcrypt('manager'),
            'name' => 'manager',
            'email' => 'manager@gmail.com',
        ])->assignRole('manager');

        User::factory()->create([
            'username' => 'engineer',
            'password' => bcrypt('engineer'),
            'name' => 'engineer',
            'email' => 'engineer@gmail.com',
        ])->assignRole('engineer');
        

        User::factory()->count(10)->create()->each(function ($user) {
            $user->assignRole(Role::all()->random());
        });
    }
}
