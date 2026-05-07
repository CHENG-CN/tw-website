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

    public function listarTodasIncidencias(){

        // Usar directamente el de validar

        $todas = collect(config('incidencias_reportadas'))->collapse();

        $validadas = $todas->filter(function ($i) {
            return isset($i['estado']) && !empty(trim($i['estado']));
        });
        
        $todasIncidencias = $validadas;

        return view('dashboard_incidencias', compact('todasIncidencias'));
    }

    public function listarIncidenciasValidadas(Request $request)
    {
        $todas = collect(config('incidencias_reportadas'))->collapse();

        $validadas = $todas->filter(function ($i) {
            return isset($i['estado']) && !empty(trim($i['estado']));
        });

        return view('gestionar_estado', ['incidenciasValidadas' => $validadas]);
    }

    public function listarIncidenciasPorValidar(Request $request)
    {
        $todas = collect(config('incidencias_reportadas'))->collapse();

        $nuevas = $todas->filter(function ($i) {
            // Solo las que NO tienen la clave o están vacías
            return !isset($i['estado']) || empty(trim($i['estado']));
        });

        return view('validar_incidencias', ['incidenciasPendientes' => $nuevas]);
    }

    public function reportar_incidencia(Request $request)
    {
        $request->validate([
            'ubicacion' => 'required',
            'fecha' => 'required|date', 
            'descripcion' => 'required',
            'fotografia' => 'required|image|mimes:jpeg,png,jpg,gif', 
        ]);

        $path = $request->file('fotografia')->store('incidencias', 'public');
        return redirect()->route('mis_incidencias')->with('success', 'Incidencia creada correctamente');
    }
    
}
