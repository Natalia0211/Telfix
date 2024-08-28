@extends('layouts.app')

@section('titulo', 'Editar Dispositivo')
@section('cabecera', 'Editar Dispositivo')

@section('contenido')
<div class="max-w-4xl mx-auto p-4">
    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-2xl font-bold mb-4">Editar Dispositivo</h2>

        <!-- Verificar si hay mensajes de éxito o error -->
        @if(session('info'))
            <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                {{ session('info') }}
            </div>
        @endif
        @if($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-800 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulario de edición -->
        <form action="{{ route('dispositivos.update', $dispositivo->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-4">
                <label for="marca" class="block text-gray-700 font-semibold mb-2">Marca</label>
                <input 
                    type="text" 
                    id="marca" 
                    name="marca" 
                    value="{{ old('marca', $dispositivo->marca) }}" 
                    class="input input-bordered w-full" 
                    required
                />
            </div>

            <div class="mb-4">
                <label for="modelo" class="block text-gray-700 font-semibold mb-2">Modelo</label>
                <input 
                    type="text" 
                    id="modelo" 
                    name="modelo" 
                    value="{{ old('modelo', $dispositivo->modelo) }}" 
                    class="input input-bordered w-full" 
                    required
                />
            </div>

            <div class="mb-4">
                <label for="imei" class="block text-gray-700 font-semibold mb-2">IMEI</label>
                <input 
                    type="text" 
                    id="imei" 
                    name="imei" 
                    value="{{ old('imei', $dispositivo->imei) }}" 
                    class="input input-bordered w-full" 
                    required
                />
            </div>

            <div class="mb-4">
                <label for="cliente_id" class="block text-gray-700 font-semibold mb-2">Cliente</label>
                <input 
                    type="text" 
                    id="cliente_id" 
                    value="{{ $dispositivo->cliente->nombre }} {{ $dispositivo->cliente->apellidos }}" 
                    class="input input-bordered w-full bg-gray-200 cursor-not-allowed" 
                    readonly
                />
            </div>

            <div class="flex justify-end mt-6">
                <a href="{{ route('dispositivos.index') }}" class="btn btn-outline mr-2">Cancelar</a>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </form>
    </div>
</div>
@endsection

