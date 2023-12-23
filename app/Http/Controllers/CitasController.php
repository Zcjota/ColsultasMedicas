<?php

namespace App\Http\Controllers;

use App\Models\Citas;
use App\Models\Usuario; 
use App\Models\Paciente;
use Illuminate\Http\Request;

class CitasController extends Controller
{

    public function index()
    {
        $citas = Citas::all();
        return view('citas.index', compact('citas'));
    }

    public function create() 
    {
        $usuarios = Usuario::all();
        $pacientes = Paciente::all();
        return view('citas.create', compact('usuarios','pacientes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fecha' => 'required|date',
            'hora' => 'required',
            'motivo_consulta' => 'required|string',
            'usuario_id' => 'required|exists:usuarios,id',
            'paciente_id' => 'required|exists:pacientes,id'
        ]);

        $userId = $request->input('usuario_id');
        $exists = Citas::where('usuario_id', $userId)->where('fecha', $request->fecha)->where('hora', $request->hora)->exists();
        
        if($exists){
            return back()->withErrors('El usuario ya tiene una cita registrada en este horario');
        }

        Citas::create($request->all());

        return redirect()->route('citas.index')->with('success', 'Cita creada correctamente');
    }

    public function show(Citas $cita){
        return view('citas.show', compact('cita'));
    }

    public function edit(Citas $cita)
    {
        $usuarios = Usuario::all();
        $pacientes = Paciente::all();
        return view('citas.edit', compact('cita','usuarios','pacientes')); 
    }

    public function update(Request $request, Citas $cita)
    {
         $request->validate([
            'fecha' => 'required|date',
            'hora' => 'required',
            'motivo_consulta' => 'required|string',
            'usuario_id' => 'required|exists:usuarios,id',
            'paciente_id' => 'required|exists:pacientes,id'
        ]);

        $cita->update($request->all());

        return redirect()->route('citas.index')->with('success', 'Cita actualizada correctamente');
    }

    public function destroy(Citas $cita)
    {
        $cita->delete();
        return redirect()->route('citas.index')->with('success', 'Cita eliminada correctamente');
    }

}