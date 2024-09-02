@extends('layouts.app')

@section('titulo', 'Listar Reparaciones')
@section('cabecera', 'Listar Reparaciones')

@section('contenido')
    {{-- Mostrar mensajes de éxito --}}
    @if(session('success'))
        <div class="alert alert-success mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- Botón para crear una nueva reparación --}}
    <div class="flex justify-end m-4">
        <a href="{{ route('reparaciones.create') }}" class="btn btn-outline btn-sm">Nueva Reparación</a>
    </div>

    {{-- Tabla de reparaciones --}}
    <div class="overflow-x-auto">
        <table class="table table-zebra w-full">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID Empleado</th>
                    <th>Fecha de Reparación</th>
                    <th>Costo de Reparación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reparaciones as $reparacion)
                <tr>
                    <td>{{ $reparacion->id }}</td>
                    <td>{{ $reparacion->solicitud_id }}</td>
                    <td>{{ $reparacion->empleado_id }}</td>
                    <td>{{ $reparacion->fecha_reparacion->format('d/m/Y H:i') }}</td>
                    <td>${{ number_format($reparacion->costo_reparacion, 2) }}</td>
                    <td class="flex space-x-2">
                        <a href="{{ route('reparaciones.edit', $reparacion->id) }}" class="btn btn-warning btn-xs">Editar</a>
                        <form action="{{ route('reparaciones.destroy', $reparacion->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-error btn-xs" onclick="return confirm('¿Estás seguro de que deseas eliminar esta reparación?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
