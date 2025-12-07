@extends('layouts.app')

@section('title', 'Editar Lugar')

@section('content')
    <div class="form-container">
        <form method="POST" action="{{ route('lugares.actualizar', $lugar->id) }}">
            @csrf
            <div class="form-group">
                <label>Nombre:</label>
                <input type="text" name="nombre" value="{{ $lugar->nombre }}" required>
            </div>
            <div class="form-group">
                <label>Dirección:</label>
                <input type="text" name="direccion" value="{{ $lugar->direccion }}" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="{{ route('lugares.index') }}" class="btn">Cancelar</a>
            </div>
        </form>
    </div>
@endsection