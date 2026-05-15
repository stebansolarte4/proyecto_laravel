@extends('layouts.app')

@section('title', 'Registro de Usuarios - Biblioteca')

@section('content')

<style>
    body{
        background: linear-gradient(135deg, #4b2e05, #8b5e34, #d4a373);
        min-height: 100vh;
        font-family: 'Segoe UI', sans-serif;
    }

    .registro-container{
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 40px 20px;
    }

    .registro-card{
        width: 100%;
        max-width: 550px;
        background: rgba(255,255,255,0.95);
        backdrop-filter: blur(10px);
        border-radius: 20px;
        padding: 35px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.2);
    }

    .registro-card h1{
        text-align: center;
        color: #5c3b1e;
        margin-bottom: 25px;
        font-weight: bold;
    }

    .form-label{
        font-weight: 600;
        color: #4a3425;
        margin-bottom: 8px;
    }

    .form-control,
    .form-select{
        width: 100%;
        padding: 12px;
        border-radius: 10px;
        border: 1px solid #d6c2a8;
        margin-bottom: 18px;
        transition: 0.3s;
    }

    .form-control:focus,
    .form-select:focus{
        border-color: #8b5e34;
        box-shadow: 0 0 8px rgba(139,94,52,0.4);
        outline: none;
    }

    .btn-registrar{
        width: 100%;
        background: #5c3b1e;
        color: white;
        padding: 14px;
        border: none;
        border-radius: 12px;
        font-size: 16px;
        font-weight: bold;
        transition: 0.3s;
    }

    .btn-registrar:hover{
        background: #3e2612;
        transform: scale(1.02);
    }

    .btn-cancelar{
        width: 100%;
        display: block;
        text-align: center;
        margin-top: 12px;
        padding: 12px;
        border-radius: 12px;
        background: #d4a373;
        color: white;
        text-decoration: none;
        font-weight: bold;
        transition: 0.3s;
    }

    .btn-cancelar:hover{
        background: #b07d4f;
    }

    .icono{
        text-align: center;
        font-size: 55px;
        margin-bottom: 10px;
    }

</style>

<div class="registro-container">

    <div class="registro-card">

        <div class="icono">
            📚
        </div>

        <h1>Registrar Usuario</h1>

        <form action="{{ route('usuarios.store') }}" method="POST">
            @csrf

            <!-- Nombre -->
            <label for="nombre" class="form-label">
                Nombre Completo
            </label>

            <input 
                type="text"
                name="nombre"
                id="nombre"
                class="form-control"
                placeholder="Ingrese el nombre completo"
                required
            >

            <!-- Correo -->
            <label for="email" class="form-label">
                Correo Electrónico
            </label>

            <input 
                type="email"
                name="email"
                id="email"
                class="form-control"
                placeholder="ejemplo@correo.com"
                required
            >

            <!-- Contraseña -->
            <label for="password" class="form-label">
                Contraseña
            </label>

            <input 
                type="password"
                name="password"
                id="password"
                class="form-control"
                placeholder="Ingrese la contraseña"
                required
            >

            <!-- Rol -->
            <label for="rol" class="form-label">
                Rol del Usuario
            </label>

            <select name="rol" id="rol" class="form-select" required>

                <option value="">
                    Seleccione un rol
                </option>

                <option value="bibliotecario">
                    📖 Bibliotecario
                </option>

                <option value="estudiante">
                    🎓 Estudiante
                </option>

                <option value="profesor">
                    👨‍🏫 Profesor
                </option>

            </select>

            <!-- Botón -->
            <button type="submit" class="btn-registrar">
                Registrar Usuario
            </button>

            <!-- Cancelar -->
            <a href="{{ route('usuarios.index') }}" class="btn-cancelar">
                Cancelar
            </a>

        </form>

    </div>

</div>

@endsection