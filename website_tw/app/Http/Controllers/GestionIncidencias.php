<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GestionIncidencias extends Controller
{
    public function listarMisIncidencias(Request $request)
    {
        if (!$request->session()->has('user')){
            return redirect()->route('login');
        }

        $nombreUsuario =$request->session()->get('user');
        $todasLasIncidencias = config('incidencias_reportadas');
        $misIncidencias = $todasLasIncidencias[$nombreUsuario];

        return view('mis_incidencias', compact('misIncidencias'));
    }

    public function estadoIncidencia(Request $request, int $id)
    {
        // Cargamos el archivo de configuración
        $usuariosConIncidencias = config('incidencias_reportadas');
        $incidenciaEncontrada = null;

        // Buscamos en cada usuario hasta encontrar el ID
        foreach ($usuariosConIncidencias as $usuario => $incidencias) {
            foreach ($incidencias as $incidencia) {
                if ($incidencia['id'] == $id) {
                    $incidenciaEncontrada = $incidencia;
                    break 2; // Rompe los dos bucles foreach al encontrarlo
                }
            }
        }

        // 3. Si no existe, lanzamos un error 404
        if (!$incidenciaEncontrada) {
            abort(404, 'Incidencia no existe');
        }

        return view('estado_incidencia', ['incidencia' => $incidenciaEncontrada]);
    }

    public function listarTodasIncidencias(Request $request)
    {
        $todasIncidencias = config('incidencias_reportadas');
        return view('dashboard_incidencias', compact('todasIncidencias'));
    }

    public function listarIncidenciasPorValidar(Request $request)
    {
        return redirect()-route('login');
    }
}
