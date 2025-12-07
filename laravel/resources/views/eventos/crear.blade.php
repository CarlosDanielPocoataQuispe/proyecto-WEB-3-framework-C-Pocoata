@extends('layouts.app')

@section('title', 'Crear Evento')

@section('content')
    <div class="form-container">
        <form method="POST" action="{{ route('eventos.guardar') }}">
            @csrf
            <div class="form-group">
                <label>Nombre:</label>
                <input type="text" name="nombre" required>
            </div>
            <div class="form-group">
                <label>Fecha:</label>
                <input type="date" name="fecha" required>
            </div>
            <div class="form-group">
                <label>Lugar:</label>
                <select name="lugar_id" required>
                    <option value="">Seleccionar lugar</option>
                    @foreach($lugares as $lugar)
                        <option value="{{ $lugar->id }}">{{ $lugar->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Rol Organizador:</label>
                <select name="organizador_id" required>
                    <option value="">Seleccionar rol</option>
                    @foreach($roles as $rol)
                        <option value="{{ $rol->id }}">{{ $rol->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="{{ route('eventos.index') }}" class="btn">Cancelar</a>
            </div>
        </form>
    </div>
@endsection