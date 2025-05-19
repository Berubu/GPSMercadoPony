<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Maneja el inicio de sesión del usuario.
     */
    public function login(Request $request)
    {
        // Validar los datos proporcionados
        $credentials = $request->validate([
            'email' => 'required',  // Verifica que el email sea válido
            'password' => 'required',    // La contraseña no puede estar vacía
        ]);

        // Intentar autenticar al usuario
        if (Auth::attempt($credentials)) {
            $user = Auth::user(); // Obtén al usuario autenticado

            // Crear un token para el usuario
            $token = $user->createToken('authToken')->plainTextToken;

            // Devolver los datos del usuario junto con el token
            return response()->json([
                'success' => true,
                'message' => 'Inicio de sesión exitoso',
                'user' => $user,
                'token' => $token,
            ], 200);
        }

        // Si las credenciales son incorrectas
        return response()->json([
            'success' => false,
            'message' => 'Credenciales inválidas',
        ], 401);
    }

    /**
     * Maneja el cierre de sesión del usuario.
     */
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete(); // Revoca todos los tokens del usuario

        return response()->json([
            'success' => true,
            'message' => 'Cierre de sesión exitoso',
        ]);
    }
}
