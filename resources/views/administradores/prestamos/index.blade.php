@extends('layouts.app')

@section('content')
<div class="container" style="padding: 20px;">
    
    {{-- Encabezado --}}
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2 style="font-weight: 700; color: #1e293b;">Mis Préstamos</h2>
        <span style="color: #64748b;">{{ $prestamos->count() }} registros encontrados</span>
    </div>

    {{-- Tarjetas de Resumen (Stats) --}}
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-bottom: 30px;">
        <div style="background: #2563eb; color: white; padding: 25px; border-radius: 12px;">
            <div style="font-size: 1.2rem; margin-bottom: 5px;">🕒</div>
            <h3 style="margin: 0; font-size: 2rem;">{{ $prestamos->where('estado', 'activo')->count() }}</h3>
            <p style="margin: 0; opacity: 0.9;">Préstamos Activos</p>
        </div>

        <div style="background: #ef4444; color: white; padding: 25px; border-radius: 12px;">
            <div style="font-size: 1.2rem; margin-bottom: 5px;">⚠️</div>
            <h3 style="margin: 0; font-size: 2rem;">{{ $prestamos->where('estado', 'mora')->count() }}</h3>
            <p style="margin: 0; opacity: 0.9;">Préstamos Vencidos</p>
        </div>

        <div style="background: #10b981; color: white; padding: 25px; border-radius: 12px;">
            <div style="font-size: 1.2rem; margin-bottom: 5px;">✅</div>
            <h3 style="margin: 0; font-size: 2rem;">{{ $prestamos->where('estado', 'devuelto')->count() }}</h3>
            <p style="margin: 0; opacity: 0.9;">Libros Devueltos</p>
        </div>
    </div>

    {{-- Tabla de Detalles --}}
    <div class="card" style="background: white; padding: 20px; border-radius: 12px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);">
        <h3 style="font-size: 1.1rem; color: #1e293b; margin-bottom: 20px;">Listado Detallado</h3>
        <div style="display: grid; gap: 15px;">
            @forelse($prestamos as $prestamo)
            <div style="background: white; border-radius: 12px; padding: 20px; margin-bottom: 15px; border-left: 5px solid {{ $prestamo->estado == 'mora' ? '#ef4444' : '#2563eb' }}; display: flex; justify-content: space-between; align-items: center; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
                <div style="display: flex; align-items: center; gap: 15px;">
                    <span style="font-size: 2rem;">📘</span>
                    <div>
                        <h4 style="margin: 0; font-size: 1.1rem;">{{ $prestamo->libro->titulo }}</h4>
                        <small style="color: #64748b;">{{ $prestamo->libro->autor->nombre_autor }}</small>
                        <div style="margin-top: 5px; font-size: 0.85rem;">
                            <span>📅 Salida: {{ date('d/m/Y', strtotime($prestamo->fecha_entrega)) }}</span> |
                            <span style="color: #ef4444;">⌛ Devolución: {{ date('d/m/Y', strtotime($prestamo->fecha_devolucion)) }}</span>
                        </div>
                    </div>
                </div>

                <div>
                    @if($prestamo->estado == 'activo')
                    <form action="{{ route('prestamos.update', $prestamo->id_prestamo) }}" method="POST">
                    @csrf
                    @method('PATCH')
                        <button style="background: #10b981; color: white; border: none; padding: 8px 15px; border-radius: 6px; font-weight: 600; cursor: pointer;">
                            Marcar como Devuelto
                        </button>
                        </form>
                    @else
                        <span style="color: #64748b; font-weight: 600;">{{ ucfirst($prestamo->estado) }}</span>
                    @endif
                </div>
            </div>
            @empty
            <div style="text-align: center; padding: 40px; color: #94a3b8;">
                No hay registros de préstamos.
            </div>
            @endforelse
        </div>
    </div>

</div>
@endsection