@extends('layouts.app')

@section('titulo', 'Listar Dispositivos')
@section('cabecera', 'Listar Dispositivos')

@section('contenido')
    <div class="flex justify-end m-4">
        <a href="{{ route('dispositivos.create') }}" class="btn btn-outline btn-sm">Crear Dispositivo</a>
    </div>
    <div class="flex justify-center">
        <div class="overflow-x-auto">
            <table class="table table-zebra">
              <thead>
                <tr>
                  <th>id</th>
                  <th>marca</th>
                  <th>modelo</th>
                  <th>imei</th>
                  <th>cliente</th>
                  <th>acciones</th>
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
                                <button type="submit" onclick="return confirm('¿Desea eliminar el dispositivo {{ $dispositivo->marca }} {{ $dispositivo->modelo }}?')" class="btn btn-error btn-xs">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
              </tbody>
            </table>
        </div>
    </div>
@endsection
