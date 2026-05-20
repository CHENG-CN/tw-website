<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Incidencia;
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

        $userAdmin = User::factory()->create([
            'name' => 'Administrador',
            'email' => 'admin@test.com',
            'password' => Hash::make('tw_1234'),
            'es_admin' => true,
        ]);

        $userPepito = User::factory()->create([
            'name' => 'Pepito',
            'email' => 'pepito@test.com',
            'password' => Hash::make('tw_1234'),
            'es_admin' => false,
        ]);

        Incidencia::create([
            'titulo' => 'Baches en las carreteras',
            'fecha' => '2026-05-01',
            'user_id' => $userAdmin->id,
            'detalle' => 'Hay unos baches en el suelo',
            'ubicacion' => 'C/Ronda n100',
            'estado' => 'pendiente', 
            # Solocionar lo de las imágenes
            'foto' => 'storage/incidencias/baches.jpeg',
            'info_img' => 'Baches',
        ]);

        Incidencia::create([
            'titulo' => 'Farolas rotas',
            'fecha' => '2026-05-04',
            'user_id' => $userAdmin->id,
            'detalle' => 'Farolas rotas en plaza españa',
            'ubicacion' => 'Parque Almunia',
            'estado' => 'en_proceso',
            'foto' => 'storage/incidencias/farolas.jpeg',
            'info_img' => 'Farola',
        ]);


        // --- Incidencias de Pepito ---
        Incidencia::create([
            'titulo' => 'Semaforos rotos',
            'fecha' => '2026-05-01',
            'user_id' => $userPepito->id,
            'detalle' => 'Semaforos rotos',
            'ubicacion' => 'C/Ronda n100',
            'estado' => 'solucionado',
            'foto' => 'storage/incidencias/semaforos.jpeg',
            'info_img' => 'Semaforos',
        ]);

        Incidencia::create([
            'titulo' => 'Baches en carretera',
            'fecha' => '2026-05-01',
            'user_id' => $userPepito->id, 
            'detalle' => 'Se han encontrado baches en el suelo',
            'ubicacion' => 'Plaza de toros n20',
            'estado' => 'sin_validar',
            'foto' => 'storage/incidencias/baches.jpeg',
            'info_img' => 'Descripción imagen',
        ]);
    }
}
