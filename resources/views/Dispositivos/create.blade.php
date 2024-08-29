@extends('layouts.app')

@section('titulo', 'Crear Dispositivo')

@section('contenido')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-6">Crear Dispositivo</h1>

    <form action="{{ route('dispositivos.store') }}" method="POST">
        @csrf

        <!-- Marca -->
        <div class="mb-4">
            <label for="marca" class="block text-sm font-medium text-gray-700">Marca</label>
            <input type="text" id="marca" name="marca" 
                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                   required>
            @error('marca')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Modelo -->
        <div class="mb-4">
            <label for="modelo" class="block text-sm font-medium text-gray-700">Modelo</label>
            <input type="text" id="modelo" name="modelo" 
                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                   required>
            @error('modelo')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- IMEI -->
        <div class="mb-4">
            <label for="imei" class="block text-sm font-medium text-gray-700">IMEI</label>
            <input type="text" id="imei" name="imei" 
                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                   required>
            @error('imei')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Cliente -->
        <div class="mb-4">
            <label for="cliente_id" class="block text-sm font-medium text-gray-700">Cliente</label>
            <select id="cliente_id" name="cliente_id"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                    required>
                <option value="">Selecciona un cliente</option>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id }}">{{ $cliente->nombre }} {{ $cliente->apellidos }}</option>
                @endforeach
            </select>
            @error('cliente_id')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Botones de Acción -->
        <div class="flex items-center justify-end mt-6">
            <a href="{{ route('dispositivos.index') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 mr-4">
                Cancelar
            </a>
            <button type="submit" 
                    class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Guardar
            </button>
        </div>
    </form>
</div>
@endsection
