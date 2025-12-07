<?php

namespace App\Http\Controllers;

use App\Models\Lugar;
use Illuminate\Http\Request;

class LugarController extends Controller
{
    public function index()
    {
        $lugares = Lugar::all();
        return view('lugares.index', compact('lugares'));
    }
    
    public function crear()
    {
        return view('lugares.crear');
    }
    
    public function guardar(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'direccion' => 'required'
        ]);
        
        Lugar::create([
            'nombre' => $request->nombre,
            'direccion' => $request->direccion
        ]);
        
        return redirect()->route('lugares.index');
    }
    
    public function editar($id)
    {
        $lugar = Lugar::findOrFail($id);
        return view('lugares.editar', compact('lugar'));
    }
    
    public function actualizar(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'direccion' => 'required'
        ]);
        
        $lugar = Lugar::findOrFail($id);
        
        $lugar->update([
            'nombre' => $request->nombre,
            'direccion' => $request->direccion
        ]);
        
        return redirect()->route('lugares.index');
    }
    
    public function eliminar($id)
    {
        $lugar = Lugar::findOrFail($id);
        $lugar->delete();
        
        return redirect()->route('lugares.index');
    }
}