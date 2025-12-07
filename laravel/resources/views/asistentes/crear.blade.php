@extends('layouts.app')

@section('title', 'Crear Asistente')

@section('content')
<div class="form-container">
    <form method="POST" action="{{ route('asistentes.guardar') }}">
        @csrf
        <div class="form-group">
            <label>Nombre del Asistente:</label>
            <input type="text" name="nombre" required>
        </div>
        <div class="form-group">
            <label>Contacto:</label>
            <input type="text" name="contacto" required>
        </div>
        <div class="form-group">
            <label>Evento:</label>
            <select name="evento_id" required>
                <option value="">Seleccionar evento</option>
                @foreach($eventos as $evento)
                <option value="{{ $evento->id }}">{{ $evento->nombre }} ({{ $evento->fecha }})</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('asistentes.index') }}" class="btn">Cancelar</a>
        </div>
    </form>
</div>
@endsection