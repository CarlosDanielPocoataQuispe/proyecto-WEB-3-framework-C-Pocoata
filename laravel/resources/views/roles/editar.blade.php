@extends('layouts.app')

@section('title', 'Editar Rol')

@section('content')
    <div class="form-container">
        <form method="POST" action="{{ route('roles.actualizar', $rol->id) }}">
            @csrf
            <div class="form-group">
                <label>Nombre del Rol:</label>
                <input type="text" name="nombre" value="{{ $rol->nombre }}" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="{{ route('roles.index') }}" class="btn">Cancelar</a>
            </div>
        </form>
    </div>
@endsection