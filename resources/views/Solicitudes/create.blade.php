@extends('layouts.app')

@section('titulo', 'Crear Solicitud')
@section('cabecera', 'Crear Nueva Solicitud')

@section('contenido')
<div class="container mx-auto p-4">
    <!-- Formulario de Crear Solicitud -->
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-4">Crear Nueva Solicitud</h2>

        <form action="{{ route('solicitudes.store') }}" method="POST">
            @csrf

            <!-- Selección de Cliente -->
            <div class="mb-4">
                <label for="id_cliente" class="block text-sm font-medium text-gray-700">Cliente</label>
                <select id="id_cliente" name="id_cliente" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="">Seleccione un cliente</option>
                    @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}">{{ $cliente->nombre }} {{ $cliente->apellidos }}</option>
                    @endforeach
                </select>
                @error('id_cliente')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Selección de Dispositivo -->
            <div class="mb-4">
                <label for="id_dispositivo" class="block text-sm font-medium text-gray-700">Dispositivo</label>
                <select id="id_dispositivo" name="id_dispositivo" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="">Seleccione un dispositivo</option>
                    @foreach($dispositivos as $dispositivo)
                        <option value="{{ $dispositivo->id }}">{{ $dispositivo->marca }} {{ $dispositivo->modelo }}</option>
                    @endforeach
                </select>
                @error('id_dispositivo')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Fecha de Solicitud -->
            <div class="mb-4">
                <label for="fecha_solicitud" class="block text-sm font-medium text-gray-700">Fecha de Solicitud</label>
                <input type="datetime-local" id="fecha_solicitud" name="fecha_solicitud" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                @error('fecha_solicitud')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Descripción del Problema -->
            <div class="mb-4">
                <label for="descripcion_problema" class="block text-sm font-medium text-gray-700">Descripción del Problema</label>
                <textarea id="descripcion_problema" name="descripcion_problema" rows="4" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                @error('descripcion_problema')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Botones de Enviar y Cancelar -->
            <div class="flex justify-end space-x-4">
                <a href="{{ route('solicitudes.index') }}" class="btn btn-outline btn-sm">Cancelar</a>
                <button type="submit" class="btn btn-primary btn-sm">Guardar Solicitud</button>
            </div>
        </form>
    </div>
</div>
@endsection
