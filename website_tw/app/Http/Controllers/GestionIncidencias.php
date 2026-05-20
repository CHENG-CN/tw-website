<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Incidencia;

class GestionIncidencias extends Controller
{
    public function listarMisIncidencias_bd(Request $request)
    {
        if (!Auth::check())
        {
            return redirect()->route('login');
        }
        $usuario = Auth::user();
        $misIncidencias = Incidencia::where('user_id', $usuario->id)->get();

        return view('mis_incidencias', compact('misIncidencias'));
    }

    public function estadoIncidencia(Request $request, int $id)
    {
    /*    
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
    */
        $incidenciaEncontrada = Incidencia::findOrFail($id);

        return view('estado_incidencia', ['incidencia' => $incidenciaEncontrada]);
    }

    public function listarTodasIncidencias(){

        // Usar directamente el de validar
        /*
        $todas = collect(config('incidencias_reportadas'))->collapse();

        $validadas = $todas->filter(function ($i) {
            return isset($i['estado']) && !empty(trim($i['estado']));
        });
        
        $todasIncidencias = $validadas;
        */

        $todasIncidencias = Incidencia::where('estado', '!=', 'sin_validar')->get();
        
        return view('dashboard_incidencias', compact('todasIncidencias'));
    }

    public function listarIncidenciasValidadas(Request $request)
    {
        /*
        $todas = collect(config('incidencias_reportadas'))->collapse();

        $validadas = $todas->filter(function ($i) {
            return isset($i['estado']) && !empty(trim($i['estado']));
        });
        */

        $validadas = Incidencia::where('estado', '!=', 'sin_validar')->get();

        return view('gestionar_estado', ['incidenciasValidadas' => $validadas]);
    }

    public function listarIncidenciasPorValidar(Request $request)
    {
        /*
        $todas = collect(config('incidencias_reportadas'))->collapse();

        $nuevas = $todas->filter(function ($i) {
            // Solo las que NO tienen la clave o están vacías
            return !isset($i['estado']) || empty(trim($i['estado']));
        });
        */
        
        $nuevas = Incidencia::where('estado', 'sin_validar')->get();

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

        Incidencia::create([
            'titulo' => $request->input('titulo') ?? 'Incidencia sin título',
            'fecha' => $request->input('fecha'),
            'user_id' => Auth::id(),
            'detalle' => $request->input('descripcion'),
            'ubicacion' => $request->input('ubicacion'),
            'estado' => 'sin_validar', 
            'foto' => 'storage/' . $path,
            'info_img' => $request->input('info_img') ?? '',
        ]);

        return redirect()->route('mis_incidencias')->with('success', 'Incidencia creada correctamente');
    }

    public function actualizarEstado(Request $request, int $id)
    {
        $request->validate([
            'estado' => 'required|in:pendiente,en_proceso,solucionado'
        ]);

        $incidencia = Incidencia::findOrFail($id);

        $incidencia->estado = $request->estado;

        $incidencia->save();

        return redirect()->route('estado_incidencias')->with('success', 'Estado de la incidencia actualizado correctamente');
    }
    
}
