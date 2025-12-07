@extends('layouts.app')

@section('title', 'Crear Lugar')

@section('content')
    <div class="form-container">
        <form method="POST" action="{{ route('lugares.guardar') }}">
            @csrf
            <div class="form-group">
                <label>Nombre:</label>
                <input type="text" name="nombre" required>
            </div>
            <div class="form-group">
                <label>Dirección:</label>
                <input type="text" name="direccion" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="{{ route('lugares.index') }}" class="btn">Cancelar</a>
            </div>
        </form>
    </div>
@endsection