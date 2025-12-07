<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Lugar;
use App\Models\RolOrganizador;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function index()
    {
        $eventos = Evento::with('lugar', 'rolOrganizador')->get();
        return view('eventos.index', compact('eventos'));
    }
    
    public function crear()
    {
        $lugares = Lugar::all();
        $roles = RolOrganizador::all();
        
        return view('eventos.crear', compact('lugares', 'roles'));
    }
    
    public function guardar(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'fecha' => 'required|date',
            'lugar_id' => 'required|exists:Lugares,id',
            'organizador_id' => 'required|exists:RolesOrganizador,id'
        ]);
        
        Evento::create([
            'nombre' => $request->nombre,
            'fecha' => $request->fecha,
            'lugar_id' => $request->lugar_id,
            'organizador_id' => $request->organizador_id
        ]);
        
        return redirect()->route('eventos.index');
    }
    
    public function editar($id)
    {
        $evento = Evento::findOrFail($id);
        $lugares = Lugar::all();
        $roles = RolOrganizador::all();
        
        return view('eventos.editar', compact('evento', 'lugares', 'roles'));
    }
    
    public function actualizar(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'fecha' => 'required|date',
            'lugar_id' => 'required|exists:Lugares,id',
            'organizador_id' => 'required|exists:RolesOrganizador,id'
        ]);
        
        $evento = Evento::findOrFail($id);
        
        $evento->update([
            'nombre' => $request->nombre,
            'fecha' => $request->fecha,
            'lugar_id' => $request->lugar_id,
            'organizador_id' => $request->organizador_id
        ]);
        
        return redirect()->route('eventos.index');
    }
    
    public function eliminar($id)
    {
        $evento = Evento::findOrFail($id);
        $evento->delete();
        
        return redirect()->route('eventos.index');
    }
}