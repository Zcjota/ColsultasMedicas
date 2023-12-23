<?php

namespace App\Http\Controllers;

use App\Models\Historia;  
use App\Models\Usuario;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class HistoriaController extends Controller
{
    public function index()
    {
        $historia = Historia::with('usuario', 'paciente')->get();

        return view('historia.index', compact('historia'));
    }

    public function create()
    { 
        $usuarios = Usuario::all();
        $pacientes = Paciente::all();

        return view('historia.create', compact('usuarios', 'pacientes'));
    }

    public function store(Request $request)
{
   
    $request->validate([
        'fecha_elaboracion' => 'required|date',
        'hora' => 'required',
        'descripcion' => 'required|string',
        'diagnostico' => 'required|string',
        'descripcion' => 'required|string',
        'usuario_id' => 'required|exists:usuarios,id',
        'paciente_id' => 'required|exists:pacientes,id'
    ]);

    // Verificar si ya existe una historia registrada en esta fecha y hora
    $exists = Historia::where('fecha_elaboracion', $request->fecha_elaboracion)
                     ->where('hora', $request->hora)
                     ->exists();

    if ($exists) {
        return back()->withErrors('Ya existe una historia registrada en esta fecha y hora.');
    }

    $historia = new Historia; 
    $historia->fill($request->all());

    $usuario = Usuario::find($request->usuario_id);
    $historia->usuario()->associate($usuario);

    $paciente = Paciente::find($request->paciente_id); 
    $historia->paciente()->associate($paciente);    

    $historia->save();

    return redirect()->route('historia.index')->with('status', 'Historia Creada');
}


    public function show(Historia $historia)
    {
        return view('historia.show', compact('historia'));
    }

    public function edit(Historia $historia)
    {
        $usuarios = Usuario::all();
        $pacientes = Paciente::all();

        return view('historia.edit', compact('historia', 'usuarios', 'pacientes')); 
    }
    
    public function update(Request $request, Historia $historia)
{
    // Lógica de actualización
    $request->validate([
        'fecha_elaboracion' => 'required|date',
        // ... (otras validaciones)
    ]);

    $historia->update($request->all());

    return redirect('/historia')->with('success', 'Historia actualizada correctamente');
}


    public function destroy(Historia $historia)
    {
        $historia->delete();
        return redirect()->route('historia.index')->with('status', 'Historia Eliminada'); 
    }

}