@extends('layouts.app')

@section('title', 'Eventos')

@section('content')
    <div class="actions">
        <a href="{{ route('eventos.crear') }}" class="btn btn-primary">Nuevo Evento</a>
    </div>

    @if($eventos->isEmpty())
        <p>No hay eventos registrados.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Fecha</th>
                    <th>Lugar</th>
                    <th>Organizador</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($eventos as $evento)
                <tr>
                    <td>{{ $evento->id }}</td>
                    <td>{{ $evento->nombre }}</td>
                    <td>{{ $evento->fecha }}</td>
                    <td>{{ $evento->lugar->nombre }}</td>
                    <td>{{ $evento->rolOrganizador->nombre }}</td>
                    <td>
                        <a href="{{ route('eventos.editar', $evento->id) }}" class="btn btn-edit">Editar</a>
                        <a href="{{ route('eventos.eliminar', $evento->id) }}" class="btn btn-delete">Eliminar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection