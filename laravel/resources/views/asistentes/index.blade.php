@extends('layouts.app')

@section('title', 'Asistentes')

@section('content')
    <div class="actions">
        <a href="{{ route('asistentes.crear') }}" class="btn btn-primary">Nuevo Asistente</a>
    </div>

    @if($asistentes->isEmpty())
        <p>No hay asistentes registrados.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Contacto</th>
                    <th>Evento</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($asistentes as $asistente)
                <tr>
                    <td>{{ $asistente->id }}</td>
                    <td>{{ $asistente->nombre }}</td>
                    <td>{{ $asistente->contacto }}</td>
                    <td>{{ $asistente->evento->nombre }}</td>
                    <td>
                        <a href="{{ route('asistentes.editar', $asistente->id) }}" class="btn btn-edit">Editar</a>
                        <a href="{{ route('asistentes.eliminar', $asistente->id) }}" class="btn btn-delete">Eliminar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection