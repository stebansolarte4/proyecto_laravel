<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Biblioteca Inmaculada Concepción</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        :root { --primary: #4f46e5; --dark: #1e293b; --light: #f8fafc; }
        body { font-family: 'Inter', sans-serif; background: var(--light); margin: 0; display: flex; }
        
        /* Sidebar Estilo Figma */
        .sidebar { width: 260px; background: var(--dark); color: white; min-height: 100vh; position: fixed; padding: 20px; }
        .sidebar h2 { font-size: 1.2rem; border-bottom: 1px solid #334155; padding-bottom: 15px; margin-bottom: 20px; color: #60a5fa; }
        .nav-link { display: block; color: #94a3b8; padding: 12px; text-decoration: none; border-radius: 8px; transition: 0.3s; }
        .nav-link:hover { background: #334155; color: white; }
        .nav-link.active { background: var(--primary); color: white; }

        /* Contenido Principal */
        .main { margin-left: 260px; flex: 1; padding: 40px; }
        .card { background: white; border-radius: 12px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1); padding: 25px; }
        
        /* Tablas */
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th { text-align: left; padding: 15px; border-bottom: 2px solid #edf2f7; color: #64748b; font-size: 0.85rem; text-transform: uppercase; }
        td { padding: 15px; border-bottom: 1px solid #f1f5f9; color: #1e293b; }
        
        .btn { padding: 8px 16px; border-radius: 6px; text-decoration: none; font-weight: 500; cursor: pointer; }
        .btn-add { background: var(--primary); color: white; border: none; }
    </style>
</head>
<body>
    <aside class="sidebar">
        <h2>Inmaculada Concepción</h2>
        <nav>
            <a href="{{ route('libros.index') }}" class="nav-link {{ request()->is('admin/libros*') ? 'active' : '' }}">📚 Libros</a>
            <a href="{{ route('prestamos.index') }}" class="nav-link {{ request()->is('admin/prestamos*') ? 'active' : '' }}">🤝 Préstamos</a>
            <a href="{{ route('usuarios.index') }}" class="nav-link {{ request()->is('admin/usuarios*') ? 'active' : '' }}">👥 Usuarios</a>
            <a href="{{ route('autores.index') }}" class="nav-link {{ request()->is('admin/autores*') ? 'active' : '' }}">✍️ Autores</a>
        </nav>
    </aside>

    <main class="main">
        @yield('content')
    </main>
</body>
</html>