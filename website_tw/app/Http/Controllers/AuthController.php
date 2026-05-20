<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function login_db(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        

        if (Auth::attempt($credentials)) {
            // Limpia y renueva el token de la sessión para evitar ataques maliciosos
            $request->session()->regenerate();

            // Redirige al usuario a la página 
            return redirect()->route('home');
        }
        else {
            //TODO! Hacer que en el login se muestre el error
            return redirect()->route('login')->with('error', 'Credenciales incorrectos.');
        }
    }

    public function logout_db(Request $request)
    {
        // Desconecta al usuario
        Auth::logout();

        // Invalida la sesión actual
        $request->session()->invalidate();
        // Regenerar los tokens de seguridad
        $request->session()->regenerateToken();

        // TODO! Hacer que se muestre los mensajes
        return redirect()->route('home')->with('success', 'Se ha cerrado la sesion correctamente');
    }

    public function register(Request $request)
    {
        // Validar los campos 
        $data = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'unique:users'], //'unique:nombre_tabla'
            'password' => ['required', 'string'],
        ]);

        // Creamos el usuario en la base de datos
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        // Iniciamos la sesión automáticamente
        Auth::login($user);

        // TODO! Hacer que se muestre los mensajes
        return redirect()->route('home')->with('success', '¡Cuenta creada!');
    }
}
