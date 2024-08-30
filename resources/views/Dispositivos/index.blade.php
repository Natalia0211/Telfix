@extends('layouts.app')

@section('titulo', 'Listar Dispositivos')
@section('cabecera', 'Listar Dispositivos')

@section('contenido')
    {{-- Botón para crear un nuevo dispositivo --}}
    <div class="flex justify-end m-4">
        <a href="{{ route('dispositivos.create') }}" class="btn btn-outline btn-sm">Crear Dispositivo</a>
    </div>

    {{-- Tabla de dispositivos --}}
    <div class="overflow-x-auto">
        <table class="table table-zebra w-full">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>IMEI</th>
                    <th>Cliente</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dispositivos as $dispositivo)
                <tr>
                    <td>{{ $dispositivo->id }}</td>
                    <td>{{ $dispositivo->marca }}</td>
                    <td>{{ $dispositivo->modelo }}</td>
                    <td>{{ $dispositivo->imei }}</td>
                    <td>
                        @if($dispositivo->cliente)
                            {{ $dispositivo->cliente->nombre }} {{ $dispositivo->cliente->apellidos }}
                        @else
                            <span class="text-red-500">Cliente no disponible</span>
                        @endif
                    </td>
                    <td class="flex space-x-2">
                        <a href="{{ route('dispositivos.edit', $dispositivo->id) }}" class="btn btn-warning btn-xs">Editar</a>
                        <form action="{{ route('dispositivos.destroy', $dispositivo->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-error btn-xs" onclick="return confirm('¿Desea eliminar el dispositivo {{ $dispositivo->marca }} {{ $dispositivo->modelo }}?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
