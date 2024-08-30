@extends('layouts.app')

@section('titulo', 'Iniciar Sesión')
@section('cabecera', 'Ingresar al sistema')

@section('contenido')
<div class="container mx-auto p-4">
    <div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-lg">
        <h2 class="text-2xl font-semibold mb-6">Iniciar Sesión</h2>
        <form action="{{ route('login') }}" method="POST">
            @csrf

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" 
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-1 focus:ring-indigo-500 sm:text-sm" 
                    required autofocus>
                @error('email')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Contraseña -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
                <input type="password" id="password" name="password" 
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-1 focus:ring-indigo-500 sm:text-sm" 
                    required>
                @error('password')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Botones -->
            <div class="form-control mt-6">
                <button class="btn btn-sm btn-primary">Ingresar</button>
                <a href="{{ route('inicio') }}" class="btn btn-sm btn-outline btn-primary mt-4">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection
