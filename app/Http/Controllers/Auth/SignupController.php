<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class SignupController extends Controller
{
    public function show()
    {
        return view('auth.signup');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nombre'   => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:usuario,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Guardado manual (como en tu otro proyecto)
        $usuario = new Usuario();
        $usuario->nombre = $request->nombre;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->password);
        $usuario->idrol = 2; // <-- LÍNEA AGREGADA (asigna rol Cliente)
        $usuario->save();

        Auth::login($usuario);

        return redirect()->route('venta')->with('success', 'Registro exitoso, bienvenido!');
    }
}