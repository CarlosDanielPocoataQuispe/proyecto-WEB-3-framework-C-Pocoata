@extends('layouts.app')

@section('title', 'Editar Asistente')

@section('content')
    <div class="form-container">
        <form method="POST" action="{{ route('asistentes.actualizar', $asistente->id) }}">
            @csrf
            <div class="form-group">
                <label>Nombre del Asistente:</label>
                <input type="text" name="nombre" value="{{ $asistente->nombre }}" required>
            </div>
            <div class="form-group">
                <label>Contacto:</label>
                <input type="text" name="contacto" value="{{ $asistente->contacto }}" required>
            </div>
            <div class="form-group">
                <label>Evento:</label>
                <select name="evento_id" required>
                    <option value="">Seleccionar evento</option>
                    @foreach($eventos as $evento)
                        <option value="{{ $evento->id }}" {{ $evento->id == $asistente->evento_id ? 'selected' : '' }}>
                            {{ $evento->nombre }} ({{ $evento->fecha }})
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="{{ route('asistentes.index') }}" class="btn">Cancelar</a>
            </div>
        </form>
    </div>
@endsection