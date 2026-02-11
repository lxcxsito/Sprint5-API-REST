<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        // Validació
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed', // password_confirmation
        ]);

        // Crear usuari
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => User::ROLE_USER, // rol per defecte
        ]);

        // Generar token d'API
        $token = $user->createToken('api-token')->plainTextToken;

        // Retornar JSON
        return response()->json([
            'message' => 'Usuari creat correctament',
            'user' => $user,
            'token' => $token
        ], 201);
    }
}
    ?>