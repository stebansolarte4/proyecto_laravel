<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Biblioteca Inmaculada Concepción</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>

        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root{
            --marron-dark: #4b2e05;
            --marron-medium: #8b5e34;
            --marron-light: #d4a373;
            --crema: #fffaf5;
            --blanco: #ffffff;
            --gris: #e7d3c1;
            --rojo: #abb00f;
        }

        body{
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, var(--marron-dark), var(--marron-medium), var(--marron-light));
            min-height: 100vh;
            display: flex;
        }

        /* SIDEBAR */

        .sidebar{
            width: 280px;
            min-height: 100vh;
            background: rgba(255,255,255,0.12);
            backdrop-filter: blur(15px);
            border-right: 1px solid rgba(255,255,255,0.15);
            padding: 30px 20px;
            position: fixed;
            left: 0;
            top: 0;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .logo{
            text-align: center;
            margin-bottom: 40px;
        }

        .logo h2{
            color: white;
            font-size: 24px;
            font-weight: 700;
            margin-top: 10px;
        }

        .logo p{
            color: rgba(255,255,255,0.7);
            font-size: 14px;
        }

        .nav-links{
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .nav-link{
            text-decoration: none;
            color: rgba(255,255,255,0.8);
            padding: 14px 18px;
            border-radius: 14px;
            transition: 0.3s;
            font-size: 15px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .nav-link:hover{
            background: rgba(255,255,255,0.15);
            color: white;
            transform: translateX(5px);
        }

        .nav-link.active{
            background: white;
            color: var(--marron-dark);
            font-weight: 600;
        }

        /* BOTÓN LOGOUT */

        .logout-btn{
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 14px;
            background: var(--rojo);
            color: white;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
            margin-top: 20px;
        }

        .logout-btn:hover{
            background: #7b8402;
            transform: scale(1.03);
        }

        /* CONTENIDO */

        .main{
            margin-left: 280px;
            flex: 1;
            padding: 40px;
        }

        .content-card{
            background: rgba(255,255,255,0.92);
            backdrop-filter: blur(10px);
            border-radius: 25px;
            padding: 35px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
            min-height: calc(100vh - 80px);
        }

        /* TABLAS */

        table{
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            overflow: hidden;
            border-radius: 15px;
        }

        thead{
            background: var(--marron-dark);
            color: white;
        }

        th{
            text-align: left;
            padding: 16px;
            font-size: 14px;
            font-weight: 600;
        }

        td{
            padding: 16px;
            border-bottom: 1px solid var(--gris);
            color: #3b2f2f;
            background: var(--crema);
        }

        tr:nth-child(even) td{
            background: #f7ede2;
        }

        tr:hover td{
            background: #ede0d4;
        }

        /* BOTONES */

        .btn{
            padding: 10px 18px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            transition: 0.3s;
            border: none;
            cursor: pointer;
        }

        .btn-add{
            background: var(--marron-dark);
            color: white;
        }

        .btn-add:hover{
            background: #2d1a05;
            transform: scale(1.03);
        }

        /* RESPONSIVE */

        @media(max-width: 900px){

            .sidebar{
                width: 100%;
                height: auto;
                position: relative;
                min-height: auto;
            }

            .main{
                margin-left: 0;
                padding: 20px;
            }

            body{
                flex-direction: column;
            }

        }

    </style>

</head>

<body>

    <!-- SIDEBAR -->

    <aside class="sidebar">

        <div>

            <div class="logo">
                <div style="font-size: 55px;">📚</div>

                <h2>INMACLOUD</h2>

                <p>Inmaculada Concepción</p>
            </div>

            <nav class="nav-links">

                <a href="{{ route('libros.index') }}" 
                   class="nav-link {{ request()->is('admin/libros*') ? 'active' : '' }}">
                    📚 Libros
                </a>

                <a href="{{ route('prestamos.index') }}" 
                   class="nav-link {{ request()->is('admin/prestamos*') ? 'active' : '' }}">
                    🤝 Préstamos
                </a>

                <a href="{{ route('usuarios.index') }}" 
                   class="nav-link {{ request()->is('admin/usuarios*') ? 'active' : '' }}">
                    👥 Usuarios
                </a>

                <a href="{{ route('autores.index') }}" 
                   class="nav-link {{ request()->is('admin/autores*') ? 'active' : '' }}">
                    ✍️ Autores
                </a>

            </nav>

        </div>

        <!-- BOTÓN CERRAR SESIÓN -->

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="logout-btn">
                🚪 Cerrar Sesión
            </button>
        </form>

    </aside>

    <!-- CONTENIDO -->

    <main class="main">

        <div class="content-card">

            @yield('content')

        </div>

    </main>

</body>
</html>