<?php

namespace App\Http\Controllers;

use App\Models\Recetario;
use App\Models\Historia;
use App\Models\Paciente;
use App\Models\Usuario;
use Illuminate\Http\Request;

class RecetarioController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
        $pacienteId = $request->input('paciente_id');
        $usuarioId = $request->input('usuario_id');

        $pacientes = Paciente::all();
        $usuarios = Usuario::all();

        $recetarios = Recetario::whereHas('historia', function ($historiaQuery) use ($query, $pacienteId, $usuarioId) {
            if (!empty($query)) {
                $historiaQuery->whereHas('paciente', function ($pacienteQuery) use ($query) {
                    $pacienteQuery->where('nombre', 'like', "%$query%");
                })->orWhereHas('usuario', function ($usuarioQuery) use ($query) {
                    $usuarioQuery->where('nombre', 'like', "%$query%");
                });
            }

            if (!empty($pacienteId)) {
                $historiaQuery->where('paciente_id', $pacienteId);
            }

            if (!empty($usuarioId)) {
                $historiaQuery->where('usuario_id', $usuarioId);
            }
        })->get();

        return view('recetarios.index', compact('recetarios', 'pacientes', 'usuarios'));
    }

    public function create() 
    {
        $historias = Historia::all();
        return view('recetarios.create', compact('historias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'historia_id' => 'required|exists:historias,id',
        ]);
        

        Recetario::create($request->all());

        return redirect()->route('recetario.index')->with('success', 'Recetario creado correctamente');
    }

    public function show(Recetario $recetario)
    {
        return view('recetario.show', compact('recetario'));
    }

    public function edit(Recetario $recetario)
    {
        $historias = Historia::all();
        return view('recetarios.edit', compact('recetario', 'historias')); 
    }

   // RecetarioController.php

   public function update(Request $request, Recetario $recetario)
   {
       $request->validate([
           'historia.diagnostico' => 'required',
           'historia.tratamiento' => 'required',
           // ... otras validaciones según tus necesidades
       ]);
   
       $recetario->historia->update($request->input('historia'));
       $recetario->update($request->except('historia'));
   
       return redirect()->route('recetario.index')->with('success', 'Recetario actualizado correctamente');
   }
   


    public function destroy(Recetario $recetario)
    {
        $recetario->delete();
        return redirect()->route('recetario.index')->with('success', 'Recetario eliminado correctamente');
    }
    public function search(Request $request)
{
    $searchQuery = $request->input('query');

    $recetarios = Recetario::whereHas('historia', function ($historiaQuery) use ($searchQuery) {
        $historiaQuery->whereHas('paciente', function ($pacienteQuery) use ($searchQuery) {
            $pacienteQuery->where('nombre', 'like', "%$searchQuery%");
        })->orWhereHas('usuario', function ($usuarioQuery) use ($searchQuery) {
            $usuarioQuery->where('nombre', 'like', "%$searchQuery%");
        });
    })->get();

    return view('recetario.index', compact('recetarios'));
}



}
