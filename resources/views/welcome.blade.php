@extends('layouts.app')

@section('titulo', 'Pagina Principal')

@section('contenido')
<div class="hero bg-base-200 min-h-screen">
    <div class="hero-content flex-col lg:flex-row">
      <img
        src="https://img.daisyui.com/images/stock/photo-1635805737707-575885ab0820.webp"
        class="max-w-sm rounded-lg shadow-2xl" />
      <div>
        <h1 class="text-5xl font-bold">Bienvenido a TelFix</h1>
        <p class="py-6">
          TelFix es la solución definitiva para optimizar y gestionar eficientemente todas las actividades relacionadas con la reparación de dispositivos móviles. Desde la recepción de solicitudes hasta la facturación y el seguimiento de inventario, TelFix está diseñado para cubrir todas las necesidades de tu negocio.
</p>
        </p>
        <button class="btn btn-primary">Get Started</button>
      </div>
    </div>
  </div>     
  @endsection