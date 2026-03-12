<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Rol;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UsuarioController extends Controller
{
    function lista(): View
    {
        $datos = [];
        $datos['lista'] = Usuario::all();
        return view('usuario.listado')->with($datos);
    }

    function formulario($id = 0): View
    {
        $datos = [];
        $datos['idrol'] = Rol::all();

        if ($id == 0) {
            $datos['usuarios'] = new Usuario();
            $datos['operacion'] = 'Agregar';
        } else {
            $datos['usuarios'] = Usuario::find($id);
            $datos['operacion'] = 'Modificar';
        }

        return view('usuario.formulario')->with($datos);
    }

    function save(Request $request)
    {

        $context = $request->all();

        switch ($context['operacion']) {

            case 'Agregar':

                // verificar si el email ya existe
                if (Usuario::where('email', $context['email'])->exists()) {
                    return back()->with('error', 'El correo ya existe');
                }

                $usuario = new Usuario();
                $usuario->nombre = $context['nombre']; // ← agregado
                $usuario->email = $context['email'];

                if ($context['password'] != '') {
                    $usuario->password = bcrypt($context['password']);
                }

                $usuario->idrol = $context['idrol'];
                $usuario->save();

                break;

            case 'Modificar':

                $usuario = Usuario::find($context['id']);

                // verificar duplicado excepto el mismo usuario
                if (
                    Usuario::where('email', $context['email'])
                        ->where('id', '!=', $context['id'])
                        ->exists()
                ) {
                    return back()->with('error', 'El correo ya existe');
                }

                $usuario->nombre = $context['nombre']; // ← agregado
                $usuario->email = $context['email'];

                if ($context['password'] != '') {
                    $usuario->password = bcrypt($context['password']);
                }

                $usuario->idrol = $context['idrol'];
                $usuario->save();

                break;

            case 'Eliminar':

                $usuario = Usuario::find($request->input('id'));
                $usuario->delete();

                break;
        }

        return redirect()->route('lista');
    }
}