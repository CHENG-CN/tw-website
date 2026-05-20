<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Administrador',
            'email' => 'admin@test.com',
            'password' => Hash::make('tw_1234'),
            'es_admin' => true,
        ]);

        User::factory()->create([
            'name' => 'Pepito',
            'email' => 'pepito@test.com',
            'password' => Hash::make('tw_1234'),
            'es_admin' => false,
        ]);
    }
}
