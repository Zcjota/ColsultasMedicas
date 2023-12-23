<?php

// app/Http/Controllers/UsuarioController.php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Rolusuario;
use App\Models\Paciente;
use App\Models\Historia;
use App\Models\Citas;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::all();
        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'contrasena' => 'required|string|min:8|max:16',
            // Otras reglas de validación...
        ]);

        try {
            $usuario = new Usuario();
            $usuario->nombre = $request->input('nombre');
            $usuario->contrasena = bcrypt($request->input('contrasena'));
            // Agregar otros campos según sea necesario...

            $usuario->save();

            return redirect()->route('usuarios.index')->with('success', 'Usuario creado correctamente.');

        } catch (\Exception $e) {
            if ($e->getCode() == 23000 && str_contains($e->getMessage(), "usuarios_nombre_unique")) {
                $mensaje = "El nombre de usuario ya existe";
                
                return back()
                    ->withErrors(['nombre' => $mensaje]) 
                    ->withInput();

            } else {
                // Manejar otro error BD
            }
        }
    }

    public function show(Usuario $usuario)
    {
        return view('usuarios.show', compact('usuario'));
    }

    public function edit(Usuario $usuario)
    {
        return view('usuarios.edit', compact('usuario'));
    }

    public function update(Request $request, Usuario $usuario)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'contrasena' => 'nullable|string|min:8|max:16',
            // Otras reglas de validación...
        ]);

        // Actualizar otros campos según sea necesario...
        $usuario->nombre = $request->input('nombre');

        // Actualizar la contraseña solo si se proporciona una nueva
        if ($request->filled('contrasena')) {
            $usuario->contrasena = bcrypt($request->input('contrasena'));
        }

        $usuario->save();

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado correctamente.');
    }

    public function destroy(Usuario $usuario)
{
    // Eliminar registros relacionados
    $usuario->rolusuario()->delete();
    $usuario->citas()->delete();
    $usuario->pacientes()->delete();
    $usuario->historias()->delete();
    // Luego, elimina el usuario
    $usuario->delete();

    return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado correctamente.');
}

    // Otras funciones relacionadas...

    // Ejecutar en la consola:
    // php artisan make:controller UsuarioController
}
