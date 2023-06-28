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
        \App\Models\Empleado::factory(15)->create();

        $this->call(RoleSeeder::class);

         \App\Models\User::factory()->create([
             'name' => 'Test User',
             'email' => 'test@example.com', //la contraseña por defecto es "password"
         ])->assignRole('admin'); 

         \App\Models\User::factory()->create([
            'name' => 'Test User2',
            'email' => 'test2@example.com', //la contraseña por defecto es "password"
        ])->assignRole('usuario'); 
    }
}
