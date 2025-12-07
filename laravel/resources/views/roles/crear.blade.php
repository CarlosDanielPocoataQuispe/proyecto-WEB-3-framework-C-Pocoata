@extends('layouts.app')

@section('title', 'Crear Rol')

@section('content')
    <div class="form-container">
        <form method="POST" action="{{ route('roles.guardar') }}">
            @csrf
            <div class="form-group">
                <label>Nombre del Rol:</label>
                <input type="text" name="nombre" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="{{ route('roles.index') }}" class="btn">Cancelar</a>
            </div>
        </form>
    </div>
@endsection