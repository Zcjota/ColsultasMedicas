<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use App\Models\Usuario;

class PacienteController extends Controller
{
    public function index()
    {
        $pacientes = Paciente::all();
        return view('pacientes.index', compact('pacientes'));
    }

    public function create()
    {
        $usuarios = Usuario::all(); // Obtener todos los usuarios

        return view('pacientes.create', ['usuarios' => $usuarios]);
    }
 
    public function store(Request $request)
    {
        // Valida y guarda los datos del nuevo paciente
        $request->validate([
            // Aquí van las reglas de validación para cada campo
            'nombre' => 'required|string',
            'sexo' => 'required|in:M,F',
            'fecha_nacimiento' => 'required|date',
            'edad' => 'required|integer',
            'id_num' => 'required|integer',
            'aseguradora' => 'required|string',
            'email' => 'required|email',
            'domicilio' => 'required|string',
            'telefono' => 'required|string',
            'otros' => 'nullable|string',
            'foto' => 'nullable|string',
            'usuario_id' => 'required|exists:usuarios,id',
            'last_used_at' => 'nullable|date',
        ]);

        try {

            Paciente::create($request->all());

            return redirect()->route('pacientes.index')->with('success', 'Paciente creado correctamente.');

        } catch (\Exception $e) {

            if ($e->getCode() == 23000 && str_contains($e->getMessage(), "pacientes_id_num_unique")) {

                $mensaje = "El paciente ya esta registrado ";
                
                return back()
                    ->withErrors(['nombre' => $mensaje]) 
                    ->withInput();

            } else {

                // Manejar otro error BD

            }

        }
    }

    public function show(Paciente $paciente)
    {
        return view('pacientes.show', compact('paciente'));
    }

    public function edit(Paciente $paciente)
    {
        return view('pacientes.edit', compact('paciente'));
    }

    public function update(Request $request, Paciente $paciente)
{
    // Valida y actualiza los datos del paciente
    $data = $request->validate([
        'nombre' => 'required|string',
        'sexo' => 'required|in:M,F',
        'fecha_nacimiento' => 'required|date',
        'edad' => 'required|integer',
        'id_num' => 'required|integer',
    ]);

    try {
        $paciente->fill($data)->save();
        return redirect()->route('pacientes.index')->with('success', 'Paciente actualizado correctamente');
    } catch (\Exception $e) {
        // Manejar otros errores si es necesario
    }
}


    public function destroy(Paciente $paciente)
    {
        $paciente->delete();
        return redirect()->route('pacientes.index')->with('success', 'Paciente eliminado correctamente');
    }
}
