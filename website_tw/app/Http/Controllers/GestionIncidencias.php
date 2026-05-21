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
        $incidenciaEncontrada = Incidencia::findOrFail($id);

        return view('estado_incidencia', ['incidencia' => $incidenciaEncontrada]);
    }

    public function listarTodasIncidencias()
    {
        $todasIncidencias = Incidencia::whereIn('estado', ['pendiente', 'en_proceso', 'solucionado'])->get();
        
        return view('dashboard_incidencias', compact('todasIncidencias'));
    }
    

    public function listarIncidenciasValidadas(Request $request)
    {

        $validadas = Incidencia::where('estado', '!=', 'sin_validar')->get();

        return view('gestionar_estado', ['incidenciasValidadas' => $validadas]);
    }

    public function listarIncidenciasPorValidar(Request $request)
    {
        $nuevas = Incidencia::where('estado', 'sin_validar')->get();

        return view('validar_incidencias', ['incidenciasPendientes' => $nuevas]);
    }

    public function reportar_incidencia(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'ubicacion' => 'required',
            'fecha' => 'required|date', 
            'descripcion' => 'required',
            'fotografia' => 'required|image|mimes:jpeg,png,jpg,gif', 
            'info_img' => 'required',
        ]);

        $path = $request->file('fotografia')->store('incidencias', 'public');

        Incidencia::create([
            'titulo' => $request->titulo,
            'fecha' => $request->fecha,
            'user_id' => auth()->id(),
            'detalle' => $request->descripcion,
            'ubicacion' => $request->ubicacion,
            'estado' => 'sin_validar', 
            'foto' => 'storage/' . $path,
            'info_img' => $request->info_img
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


    public function validarIncidencia(Request $request, int $id)
    {
        $incidencia = Incidencia::findOrFail($id);
        $incidencia->estado = 'pendiente';
        $incidencia->save();

        return redirect()->back()->with('success', 'Incidencia validada con éxito.');
    }
    //rechaza incidencias que esten sin validar
    public function rechazarIncidencia(Request $request, int $id)
    {
        $incidencia = Incidencia::findOrFail($id);
        $incidencia->estado = 'rechazada';
        $incidencia->save();

        return redirect()->back()->with('success', 'Incidencia rechazada correctamente.');
    }
    //elimina incidencias de 'Mis incidencias' del perfil personal
    public function eliminarIncidencia(int $id)
    {
        $incidencia = Incidencia::findOrFail($id);
        if ($incidencia->user_id !== auth()->id()) {
            abort(403, 'No tienes permiso para borrar esta incidencia.');
        }
        $incidencia->delete();
        return redirect()->back()->with('success', 'Incidencia eliminada correctamente.');
    }
    
}
