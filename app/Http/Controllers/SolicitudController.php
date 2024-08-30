<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Dispositivo;
use App\Models\Solicitud;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SolicitudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $solicitudes = Solicitud::all()->map(function ($solicitud) {
        
            $solicitud->fecha_solicitud = Carbon::parse($solicitud->fecha_solicitud);
            return $solicitud;
        });

        return view('solicitudes.index', compact('solicitudes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = Cliente::all();
        $dispositivos = Dispositivo::all();
        return view('solicitudes.create', compact('clientes', 'dispositivos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_cliente' => 'required|exists:clientes,id',
            'id_dispositivo' => 'required|exists:dispositivos,id',
            'fecha_solicitud' => 'required|date',
            'descripcion_problema' => 'required|string|max:255',
        ]);

        Solicitud::create($request->all());

        return redirect()->route('solicitudes.index')->with('success', 'Solicitud creada con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Solicitud $solicitud)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Solicitud $solicitud)
    {
        $clientes = Cliente::all();
        $dispositivos = Dispositivo::all();
        return view('solicitudes.edit', compact('solicitud', 'clientes', 'dispositivos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Solicitud $solicitud)
    {
        $request->validate([
            'id_cliente' => 'required|exists:clientes,id',
            'id_dispositivo' => 'required|exists:dispositivos,id',
            'fecha_solicitud' => 'required|date',
            'descripcion_problema' => 'required|string|max:255',
        ]);

        $solicitud->update($request->all());

        return redirect()->route('solicitudes.index')->with('success', 'Solicitud actualizada con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Solicitud $solicitud)
    {
        $solicitud->delete();
        return redirect()->route('solicitudes.index')->with('success', 'Solicitud eliminada con éxito.');
    }
}
