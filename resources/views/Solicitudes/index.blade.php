@extends('layouts.app')

@section('titulo', 'Listar Solicitudes')
@section('cabecera', 'Listar Solicitudes')

@section('contenido')
    {{-- Botón para crear una nueva solicitud --}}
    <div class="flex justify-end m-4">
        <a href="{{ route('solicitudes.create') }}" class="btn btn-outline btn-sm">Crear Nueva Solicitud</a>
    </div>

    {{-- Tabla de solicitudes --}}
    <div class="overflow-x-auto">
        <table class="table table-zebra w-full">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Dispositivo</th>
                    <th>Fecha de Solicitud</th>
                    <th>Descripción del Problema</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($solicitudes as $solicitud)
                <tr>
                    <td>{{ $solicitud->id }}</td>
                    <td>{{ $solicitud->cliente->nombre }} {{ $solicitud->cliente->apellidos }}</td>
                    <td>{{ $solicitud->dispositivo->marca }} {{ $solicitud->dispositivo->modelo }}</td>
                    <td>{{ $solicitud->fecha_solicitud->format('d/m/Y H:i') }}</td>
                    <td>{{ $solicitud->descripcion_problema }}</td>
                    <td class="flex space-x-2">
                        <a href="{{ route('solicitudes.edit', $solicitud->id) }}" class="btn btn-warning btn-xs">Editar</a>
                        <form action="{{ route('solicitudes.destroy', $solicitud->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-error btn-xs" onclick="return confirm('¿Estás seguro de que deseas eliminar esta solicitud?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
