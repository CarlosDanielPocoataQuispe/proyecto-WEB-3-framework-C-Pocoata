<?php

namespace App\Http\Controllers;

use App\Models\RolOrganizador;
use Illuminate\Http\Request;

class RolController extends Controller
{
    public function index()
    {
        $roles = RolOrganizador::all();
        return view('roles.index', compact('roles'));
    }
    
    public function crear()
    {
        return view('roles.crear');
    }
    
    public function guardar(Request $request)
    {
        $request->validate([
            'nombre' => 'required'
        ]);
        
        RolOrganizador::create([
            'nombre' => $request->nombre
        ]);
        
        return redirect()->route('roles.index');
    }
    
    public function editar($id)
    {
        $rol = RolOrganizador::findOrFail($id);
        return view('roles.editar', compact('rol'));
    }
    
    public function actualizar(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required'
        ]);
        
        $rol = RolOrganizador::findOrFail($id);
        
        $rol->update([
            'nombre' => $request->nombre
        ]);
        
        return redirect()->route('roles.index');
    }
    
    public function eliminar($id)
    {
        $rol = RolOrganizador::findOrFail($id);
        $rol->delete();
        
        return redirect()->route('roles.index');
    }
}