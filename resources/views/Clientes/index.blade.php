@extends('layouts.app')

@section('titulo', 'Listar Clientes')
@section('cabecera', 'Listar Clientes')

@section('contenido')

{{-- Mostrar mensajes de éxito --}}
@if(session('success'))
    <div class="alert alert-success mb-4">
        {{ session('success') }}
    </div>
@endif

{{-- Botón para crear un cliente nuevo --}}
<div class="flex justify-end m-4">
    <a href="{{ route('clientes.create') }}" class="btn btn-outline">Nuevo cliente</a>
</div>

{{-- Contenedor de cuadrícula para clientes --}}
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 m-6">
    <!-- Puedes agregar aquí los clientes o cualquier otro contenido -->
</div>

<div class="overflow-x-auto">
    <table class="table">
        <!-- head -->
        <thead>
            <tr>
                <th>id</th>
                <th>nombre</th>
                <th>apellido</th>
                <th>telefono</th>
                <th>correo_electronico</th>
                <th>acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $cliente)
            <tr>
                <th>{{ $cliente->id }}</th>
                <td>{{ $cliente->nombre }}</td>
                <td>{{ $cliente->apellidos }}</td>
                <td>{{ $cliente->telefono }}</td>
                <td>{{ $cliente->correo_electronico}}</td>
                <td class="flex space-x-2">
                    <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-outline btn-xs">Editar</a>
                    <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline btn-xs">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection


