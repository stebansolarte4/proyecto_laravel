@extends('layouts.app')

@section('title', 'Registrar Usuario - Biblioteca Inmaculada Concepción')

@section('content')
<div class="card" style="max-width: 500px; margin: 40px auto; padding: 30px; border-radius: 15px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
        <h2 style="color: #1e293b; margin: 0;">Nuevo Usuario</h2>
        <a href="{{ route('usuarios.index') }}" style="text-decoration: none; color: #64748b; font-size: 0.9rem;">← Volver</a>
    </div>

    <form action="{{ route('usuarios.store') }}" method="POST">
        @csrf
        
        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 8px; font-weight: 600; color: #475569;">Nombre Completo</label>
            <input type="text" name="nombre" class="form-control" required 
                   placeholder="Nombre del estudiante o profesor"
                   style="width: 100%; padding: 12px; border: 1px solid #e2e8f0; border-radius: 8px; outline: none;">
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 8px; font-weight: 600; color: #475569;">Correo Electrónico</label>
            <input type="text" name="correo" id="email_input" class="form-control" required 
                   placeholder="ejemplo@uniajc.edu.co" autocomplete="off"
                   style="width: 100%; padding: 12px; border: 1px solid #e2e8f0; border-radius: 8px; outline: none;">
            <small style="color: #94a3b8;">Usa Alt Gr + Q o Shift + 2 para el @</small>
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 8px; font-weight: 600; color: #475569;">Contraseña Temporal</label>
            <input type="password" name="password" class="form-control" required 
                   placeholder="Mínimo 6 caracteres"
                   style="width: 100%; padding: 12px; border: 1px solid #e2e8f0; border-radius: 8px; outline: none;">
        </div>

        <div style="margin-bottom: 25px;">
            <label style="display: block; margin-bottom: 8px; font-weight: 600; color: #475569;">Rol del Sistema</label>
            <select name="fk_rol" class="form-control" 
                    style="width: 100%; padding: 12px; border: 1px solid #e2e8f0; border-radius: 8px; background-color: white;">
                <option value="1">Administrador</option>
                <option value="2">Estudiante</option>
                <option value="3">Profesor</option>
            </select>
        </div>

        <button type="submit" class="btn btn-add" 
                style="width: 100%; background-color: #2563eb; color: white; border: none; padding: 14px; border-radius: 8px; font-weight: 600; cursor: pointer;">
            Registrar en Base de Datos
        </button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const emailInput = document.getElementById('email_input');
        
        emailInput.addEventListener('keydown', function(e) {
            // Si la tecla presionada es para el @, detenemos cualquier interrupción de otros scripts
            if (e.key === '@' || e.keyCode === 64) {
                e.stopPropagation();
            }
        });
    });
</script>
@endsection