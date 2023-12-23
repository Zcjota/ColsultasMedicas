<?php

namespace App\Http\Controllers;

use App\Models\Rolusuario;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RolusuarioController extends Controller
{
    public function index()
    {
        $rolesUsuarios = Rolusuario::all();
        return view('rolusuarios.index', compact('rolesUsuarios'));
    }

    public function create()
    {
        $usuarios = Usuario::all();
        return view('rolusuarios.create', compact('usuarios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'usuario_id' => 'required|exists:usuarios,id',
            'nombre_rol' => 'required|string|min:4',
            'last_used_at' => 'nullable|date',
        ]);

       // Obtener el id del usuario seleccionado
    $userId = $request->input('usuario_id');
    
    // Verificar si ya tiene un rol    
    $exists = Rolusuario::where('usuario_id', $userId)->exists();
    
    if($exists) {
        return back()->withErrors('Este usuario ya tiene un rol asignado');
    }

        Rolusuario::create($request->all());

        return redirect()->route('rolusuarios.index')->with('success', 'Rol de usuario creado correctamente.');
    }

    public function show(Rolusuario $rolusuario)
    {
        return view('rolusuarios.show', compact('rolusuario'));
    }

    public function edit(Rolusuario $rolusuario)
    {
        $usuarios = Usuario::all();
        return view('rolusuarios.edit', compact('rolusuario', 'usuarios'));
    }

    public function update(Request $request, Rolusuario $rolusuario)
    {
        $request->validate([
            'usuario_id' => 'required|exists:usuarios,id',
            'nombre_rol' => 'required|string|min:4',
            'last_used_at' => 'nullable|date',
        ]);

    //     // Obtener el id del usuario seleccionado
    // $userId = $request->input('usuario_id');
    
    // // Verificar si ya tiene un rol    
    // $exists = Rolusuario::where('usuario_id', $userId)->exists();
    
    // if($exists) {
    //     return back()->withErrors('Este usuario ya tiene un rol asignado');
    // }
        
        $rolusuario->update($request->all());

        return redirect()->route('rolusuarios.index')->with('success', 'Rol de usuario actualizado correctamente.');
    }

    public function destroy(Rolusuario $rolusuario)
    {
        $rolusuario->delete();

        return redirect()->route('rolusuarios.index')->with('success', 'Rol de usuario eliminado correctamente.');
    }
}
