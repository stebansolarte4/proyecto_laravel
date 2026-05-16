@extends('layouts.app')

@section('title', 'Editar Usuario')

@section('content')
<style>
    body {
        background: linear-gradient(135deg, #4b2e05, #8b5e34, #d4a373);
        min-height: 100vh;
        font-family: 'Segoe UI', sans-serif;
    }
    .form-container { padding: 40px 20px; }
    .form-card {
        background: rgba(255,255,255,0.95);
        border-radius: 20px;
        padding: 30px;
        max-width: 500px;
        margin: 0 auto;
        box-shadow: 0 10px 25px rgba(0,0,0,0.2);
    }
    h1 { color: #5c3b1e; font-weight: bold; margin-bottom: 20px; text-align: center; }
    .form-group { margin-bottom: 15px; }
    .form-label { display: block; margin-bottom: 5px; color: #5c3b1e; font-weight: 600; }
    .form-control, .form-select {
        width: 100%; padding: 10px; border: 1px solid #e7d3c1; border-radius: 10px; background: #fffaf5;
    }
    .btn-submit {
        background: #5c3b1e; color: white; width: 100%; padding: 12px; border: none; border-radius: 12px; font-weight: bold; cursor: pointer; transition: 0.3s; margin-top: 10px;
    }
    .btn-submit:hover { background: #3e2612; }
    .btn-back { display: block; text-align: center; margin-top: 15px; color: #8b5e34; text-decoration: none; font-weight: bold; }
</style>

<div class="form-container">
    <div class="form-card">
        <h1>✏️ Editar Usuario</h1>

        <form action="{{ route('usuarios.update', $usuario->id_usuario) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $usuario->nombre) }}" required>
            </div>

            <div class="form-group">
                <label class="form-label">Correo Electrónico</label>
                <input type="email" name="correo" class="form-control" value="{{ old('correo', $usuario->correo) }}" required>
            </div>

            <div class="form-group">
                <label class="form-label">Contraseña (Dejar en blanco para no cambiar)</label>
                <input type="password" name="password" class="form-control" placeholder="••••••••">
            </div>

            <div class="form-group">
                <label class="form-label">Rol del Usuario</label>
                <select name="fk_rol" class="form-select" required>
                    @foreach($roles as $rol)
                        <option value="{{ $rol->id_rol }}" {{ old('fk_rol', $usuario->fk_rol) == $rol->id_rol ? 'selected' : '' }}>
                            {{ $rol->nombre_rol }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn-submit">Actualizar Usuario</button>
            <a href="{{ route('usuarios.index') }}" class="btn-back">⬅️ Volver a la lista</a>
        </form>
    </div>
</div>
@endsection