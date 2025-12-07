@extends('layouts.app')

@section('title', 'Roles Organizador')

@section('content')
    <div class="actions">
        <a href="{{ route('roles.crear') }}" class="btn btn-primary">Nuevo Rol</a>
    </div>

    @if($roles->isEmpty())
        <p>No hay roles registrados.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($roles as $rol)
                <tr>
                    <td>{{ $rol->id }}</td>
                    <td>{{ $rol->nombre }}</td>
                    <td>
                        <a href="{{ route('roles.editar', $rol->id) }}" class="btn btn-edit">Editar</a>
                        <a href="{{ route('roles.eliminar', $rol->id) }}" class="btn btn-delete">Eliminar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection