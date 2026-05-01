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
                // Falta comprobar contreseña, daba error
                $request->session()->put('user', $user['nombre']);
                return redirect()->route('home');
            }
        }
    }
}
