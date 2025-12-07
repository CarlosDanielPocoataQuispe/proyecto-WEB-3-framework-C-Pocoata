<?php

namespace App\Http\Controllers;

use App\Models\Asistente;
use App\Models\Evento;
use Illuminate\Http\Request;

class AsistenteController extends Controller
{
    public function index()
    {
        $asistentes = Asistente::with('evento')->get();
        return view('asistentes.index', compact('asistentes'));
    }
    
    public function crear()
    {
        $eventos = Evento::all();
        return view('asistentes.crear', compact('eventos'));
    }
    
    public function guardar(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'contacto' => 'required',
            'evento_id' => 'required|exists:Eventos,id'
        ]);
        
        Asistente::create([
            'nombre' => $request->nombre,
            'contacto' => $request->contacto,
            'evento_id' => $request->evento_id
        ]);
        
        return redirect()->route('asistentes.index');
    }
    
    public function editar($id)
    {
        $asistente = Asistente::findOrFail($id);
        $eventos = Evento::all();
        
        return view('asistentes.editar', compact('asistente', 'eventos'));
    }
    
    public function actualizar(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'contacto' => 'required',
            'evento_id' => 'required|exists:Eventos,id'
        ]);
        
        $asistente = Asistente::findOrFail($id);
        
        $asistente->update([
            'nombre' => $request->nombre,
            'contacto' => $request->contacto,
            'evento_id' => $request->evento_id
        ]);
        
        return redirect()->route('asistentes.index');
    }
    
    public function eliminar($id)
    {
        $asistente = Asistente::findOrFail($id);
        $asistente->delete();
        
        return redirect()->route('asistentes.index');
    }
}