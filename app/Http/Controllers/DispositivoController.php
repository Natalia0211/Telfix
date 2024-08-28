<?php

namespace App\Http\Controllers;

use App\Models\Dispositivo;
use App\Models\Cliente;
use Illuminate\Http\Request;

class DispositivoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todos los dispositivos ordenados por marca
        $dispositivos = Dispositivo::orderBy('marca')->get();
        return view('dispositivos.index', ['dispositivos' => $dispositivos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Obtener todos los clientes ordenados por nombre
        $clientes = Cliente::orderBy('nombre')->get();
        
        // Si no existen clientes, redirigir a la vista de creación de clientes
        if ($clientes->isEmpty()) {
            return redirect()->route('clientes.create')->with('info', 'Primero debes crear un cliente');
        }

        return view('dispositivos.create', ['clientes' => $clientes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar la solicitud
        $request->validate([
            'marca' => 'required|string|max:100',
            'modelo' => 'required|string|max:100',
            'imei' => 'required|string|max:15',
            'cliente_id' => 'required|exists:clientes,id',
        ]);

        // Crear el nuevo dispositivo
        Dispositivo::create($request->all());

        return redirect()->route('dispositivos.index')->with('info', 'Dispositivo creado con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dispositivo $dispositivo)
    {
        // Mostrar detalles del dispositivo (si se necesita)
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dispositivo $dispositivo)
    {
        // Obtener todos los clientes
        $clientes = Cliente::all();

        return view('dispositivos.edit', [
            'dispositivo' => $dispositivo,
            'clientes' => $clientes
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dispositivo $dispositivo)
    {
        // Validar la solicitud
        $request->validate([
            'marca' => 'required|string|max:100',
            'modelo' => 'required|string|max:100',
            'imei' => 'required|string|max:15',
            'cliente_id' => 'required|exists:clientes,id',
        ]);

        // Actualizar el dispositivo
        $dispositivo->update($request->all());

        return redirect()->route('dispositivos.index')->with('info', 'Dispositivo actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dispositivo $dispositivo)
    {
        // Eliminar el dispositivo
        $dispositivo->delete();

        return redirect()->route('dispositivos.index')->with('info', 'Dispositivo eliminado con éxito');
    }
}
