@extends('layouts.app')

@section('title', 'Lugares')

@section('content')
    <div class="actions">
        <a href="{{ route('lugares.crear') }}" class="btn btn-primary">Nuevo Lugar</a>
    </div>

    @if($lugares->isEmpty())
        <p>No hay lugares registrados.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($lugares as $lugar)
                <tr>
                    <td>{{ $lugar->id }}</td>
                    <td>{{ $lugar->nombre }}</td>
                    <td>{{ $lugar->direccion }}</td>
                    <td>
                        <a href="{{ route('lugares.editar', $lugar->id) }}" class="btn btn-edit">Editar</a>
                        <a href="{{ route('lugares.eliminar', $lugar->id) }}" class="btn btn-delete">Eliminar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection