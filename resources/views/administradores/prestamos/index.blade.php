@extends('layouts.app')

@section('content')
<div class="container" style="padding: 20px;">
    
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2 style="font-weight: 700; color: #1e293b;">Mis Préstamos</h2>
        <span style="color: #64748b;">{{ $prestamos->count() }} préstamos activos</span>
    </div>

    <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; margin-bottom: 30px;">
        
        <div style="background: #2563eb; color: white; padding: 25px; border-radius: 12px; position: relative; overflow: hidden;">
            <div style="font-size: 1.2rem; margin-bottom: 5px;">🕒</div>
            <h3 style="margin: 0; font-size: 2rem;">1</h3>
            <p style="margin: 0; opacity: 0.9;">Préstamos Activos</p>
        </div>

        <div style="background: #ef4444; color: white; padding: 25px; border-radius: 12px;">
            <div style="font-size: 1.2rem; margin-bottom: 5px;">⚠️</div>
            <h3 style="margin: 0; font-size: 2rem;">1</h3>
            <p style="margin: 0; opacity: 0.9;">Préstamos Vencidos</p>
        </div>

        <div style="background: #10b981; color: white; padding: 25px; border-radius: 12px;">
            <div style="font-size: 1.2rem; margin-bottom: 5px;">✅</div>
            <h3 style="margin: 0; font-size: 2rem;">1</h3>
            <p style="margin: 0; opacity: 0.9;">Libros Devueltos</p>
        </div>

    </div>
    <h3 style="font-size: 1.1rem; color: #1e293b; margin-bottom: 20px;">Préstamos Activos</h3>
    
    @foreach($prestamos as $prestamo)
        @endforeach

</div>
@endsection

<div class="card">
    <table>
        <thead>
            <tr>
                <th>Libro solicitado</th>
                @if(auth()->user()->fk_rol == 1)
                    <th>Usuario</th>
                @endif
                <th>Fecha de Salida</th>
                <th>Fecha de Devolución</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @forelse($prestamos as $prestamo)
            <tr>
                <td>
                    <div style="display: flex; align-items: center;">
                        <span style="font-size: 1.5rem; margin-right: 10px;">📖</span>
                        <div>
                            <strong>{{ $prestamo->libro->titulo }}</strong><br>
                            <small style="color: #64748b;">{{ $prestamo->libro->autor->nombre_autor ?? '' }}</small>
                        </div>
                    </div>
                </td>
                
                @if(auth()->user()->fk_rol == 1)
                    <td>{{ $prestamo->usuario->nombre }}</td>
                @endif

                <td>{{ date('d/m/Y', strtotime($prestamo->fecha_entrega)) }}</td>
                <td>{{ date('d/m/Y', strtotime($prestamo->fecha_devolucion)) }}</td>
                
                <td>
                    @if($prestamo->estado == 'Pendiente')
                        <span style="background: #fef3c7; color: #92400e; padding: 5px 12px; border-radius: 15px; font-size: 0.8rem; font-weight: 600;">
                            ⏳ En posesión
                        </span>
                    @else
                        <span style="background: #dcfce7; color: #166534; padding: 5px 12px; border-radius: 15px; font-size: 0.8rem; font-weight: 600;">
                            ✅ Devuelto
                        </span>
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" style="text-align: center; padding: 40px; color: #94a3b8;">
                    No tienes préstamos activos en este momento.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
    @extends('layouts.app')

@section('content')
<div class="container">
    <h2>Mis Préstamos</h2>
    
    <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; margin-bottom: 30px;">
        <div class="card" style="background: #2563eb; color: white;">
            <h3>1</h3>
            <p>Préstamos Activos</p>
        </div>
        <div class="card" style="background: #dc2626; color: white;">
            <h3>1</h3>
            <p>Préstamos Vencidos</p>
        </div>
        <div class="card" style="background: #059669; color: white;">
            <h3>1</h3>
            <p>Libros Devueltos</p>
        </div>
    </div>

    <h3>Préstamos Activos</h3>
    @foreach($prestamos as $prestamo)
        <div class="card" style="margin-bottom: 15px; border-left: 5px solid #2563eb;">
            <div style="display: flex; justify-content: space-between;">
                <div>
                    <strong>{{ $prestamo->libro->titulo }}</strong>
                    <p>{{ $prestamo->libro->autor->nombre_autor }}</p>
                </div>
                <span class="badge" style="background: #dbeafe; color: #1e40af;">Activo</span>
            </div>
            <div style="display: flex; gap: 40px; margin-top: 10px; font-size: 0.8rem;">
                <span>📅 Fecha: {{ $prestamo->fecha_entrega }}</span>
                <span>📅 Devolución: {{ $prestamo->fecha_devolucion }}</span>
            </div>
        </div>
    @endforeach
</div>
@endsection
</div>
@endsection