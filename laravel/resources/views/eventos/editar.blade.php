@extends('layouts.app')

@section('title', 'Editar Evento')

@section('content')
    <div class="form-container">
        <form method="POST" action="{{ route('eventos.actualizar', $evento->id) }}">
            @csrf
            <div class="form-group">
                <label>Nombre:</label>
                <input type="text" name="nombre" value="{{ $evento->nombre }}" required>
            </div>
            <div class="form-group">
                <label>Fecha:</label>
                <input type="date" name="fecha" value="{{ $evento->fecha }}" required>
            </div>
            <div class="form-group">
                <label>Lugar:</label>
                <select name="lugar_id" required>
                    <option value="">Seleccionar lugar</option>
                    @foreach($lugares as $lugar)
                        <option value="{{ $lugar->id }}" {{ $lugar->id == $evento->lugar_id ? 'selected' : '' }}>
                            {{ $lugar->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Rol Organizador:</label>
                <select name="organizador_id" required>
                    <option value="">Seleccionar rol</option>
                    @foreach($roles as $rol)
                        <option value="{{ $rol->id }}" {{ $rol->id == $evento->organizador_id ? 'selected' : '' }}>
                            {{ $rol->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="{{ route('eventos.index') }}" class="btn">Cancelar</a>
            </div>
        </form>
    </div>
@endsection