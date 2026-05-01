<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
#use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $usuarios = config('usuarios.users');

        foreach ($usuarios as $user) {
            
            if ($user['email'] === $request->email) {
                // Falta comprobar contreseña
                $request->session()->put('user', $user['nombre']);
                $request->session()->put('administrador', $user['administrador']);
                return redirect()->route('home');
            }
        }
    }
}
