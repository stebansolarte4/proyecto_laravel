<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>BiblioTech | Biblioteca Virtual</title>

    <link rel="preconnect" href="https://fonts.bunny.net">

    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700,800" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-slate-950 text-white font-sans overflow-x-hidden">

    <!-- FONDO -->
    <div class="fixed inset-0 -z-10 overflow-hidden">

        <div
            class="absolute top-[-200px] left-[-200px] w-[500px] h-[500px] bg-blue-600 opacity-20 blur-3xl rounded-full">
        </div>

        <div
            class="absolute bottom-[-200px] right-[-200px] w-[500px] h-[500px] bg-purple-600 opacity-20 blur-3xl rounded-full">
        </div>

        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-5">
        </div>

    </div>

    <!-- NAVBAR -->
    <nav class="sticky top-0 z-50 backdrop-blur-xl bg-slate-950/70 border-b border-slate-800">

        <div class="max-w-7xl mx-auto px-6 py-5 flex justify-between items-center">

            <!-- LOGO -->
            <div class="flex items-center gap-3">

                <div
                    class="w-12 h-12 rounded-2xl bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center shadow-xl">

                    <span class="text-2xl">📚</span>

                </div>

                <div>

                    <h1 class="text-2xl font-extrabold tracking-wide">
                        Biblio<span class="text-blue-500">Tech</span>
                    </h1>

                    <p class="text-xs text-slate-400">
                        Biblioteca Virtual Inteligente
                    </p>

                </div>

            </div>

            <!-- BOTONES -->
            <div class="flex items-center gap-4">

                @if (Route::has('login'))

                    @auth

                        <a href="{{ url('/dashboard') }}"
                            class="px-5 py-2 rounded-xl bg-slate-800 hover:bg-slate-700 transition font-medium">

                            Dashboard

                        </a>

                    @else

                        <a href="{{ route('login') }}"
                            class="text-slate-300 hover:text-blue-400 transition font-medium">

                            Iniciar Sesión

                        </a>

                        @if (Route::has('register'))

                            <a href="{{ route('register') }}"
                                class="px-5 py-3 rounded-xl bg-gradient-to-r from-blue-600 to-purple-600 hover:scale-105 transition-all duration-300 shadow-2xl font-semibold">

                                Registrarse

                            </a>

                        @endif

                    @endauth

                @endif

            </div>

        </div>

    </nav>

    <!-- HERO -->
    <section class="max-w-7xl mx-auto px-6 py-24 flex flex-col lg:flex-row items-center gap-20">

        <!-- TEXTO -->
        <div class="flex-1">

            <div
                class="inline-flex items-center gap-2 bg-blue-500/10 border border-blue-500/20 text-blue-400 px-5 py-2 rounded-full text-sm font-medium mb-8">

                ✨ Plataforma moderna y profesional

            </div>

            <h1 class="text-5xl lg:text-7xl font-extrabold leading-tight mb-8">

                Explora el mundo de los

                <span
                    class="bg-gradient-to-r from-blue-400 via-cyan-400 to-purple-500 bg-clip-text text-transparent">

                    libros digitales

                </span>

            </h1>

            <p class="text-slate-300 text-lg leading-relaxed max-w-2xl mb-10">

                Accede a miles de libros, administra préstamos,
                descubre contenido académico y disfruta de una
                experiencia rápida, elegante y moderna desde cualquier dispositivo.

            </p>

            <!-- BOTONES -->
            <div class="flex flex-wrap gap-5">

                <a href="{{ route('register') }}"
                    class="px-8 py-4 rounded-2xl bg-gradient-to-r from-blue-600 to-purple-600 text-lg font-bold shadow-2xl hover:scale-105 transition-all duration-300">

                    Empezar Ahora

                </a>

                <a href="{{ route('login') }}"
                    class="px-8 py-4 rounded-2xl border border-slate-700 bg-slate-900/60 hover:bg-slate-800 transition text-lg font-semibold">

                    Explorar Plataforma

                </a>

            </div>

            <!-- STATS -->
            <div class="grid grid-cols-3 gap-6 mt-16">

                <div
                    class="bg-slate-900/60 backdrop-blur border border-slate-800 rounded-2xl p-6 text-center hover:-translate-y-2 transition">

                    <h2 class="text-4xl font-extrabold text-blue-400">
                        15K+
                    </h2>

                    <p class="text-slate-400 mt-2">
                        Libros
                    </p>

                </div>

                <div
                    class="bg-slate-900/60 backdrop-blur border border-slate-800 rounded-2xl p-6 text-center hover:-translate-y-2 transition">

                    <h2 class="text-4xl font-extrabold text-purple-400">
                        8K+
                    </h2>

                    <p class="text-slate-400 mt-2">
                        Usuarios
                    </p>

                </div>

                <div
                    class="bg-slate-900/60 backdrop-blur border border-slate-800 rounded-2xl p-6 text-center hover:-translate-y-2 transition">

                    <h2 class="text-4xl font-extrabold text-cyan-400">
                        24/7
                    </h2>

                    <p class="text-slate-400 mt-2">
                        Disponible
                    </p>

                </div>

            </div>

        </div>

        <!-- TARJETA -->
        <div class="flex-1 w-full">

            <div
                class="relative bg-slate-900/70 border border-slate-800 rounded-[35px] p-8 backdrop-blur-xl shadow-[0_0_80px_rgba(59,130,246,0.15)] overflow-hidden">

                <!-- DECORACIÓN -->
                <div
                    class="absolute top-0 right-0 w-40 h-40 bg-blue-500/20 blur-3xl rounded-full">
                </div>

                <div class="relative z-10">

                    <!-- HEADER -->
                    <div class="flex justify-between items-center mb-8">

                        <div>

                            <h2 class="text-3xl font-bold">
                                Biblioteca Online
                            </h2>

                            <p class="text-slate-400 mt-1">
                                Sistema activo y conectado
                            </p>

                        </div>

                        <div class="flex items-center gap-2">

                            <div class="w-3 h-3 rounded-full bg-green-400 animate-pulse"></div>

                            <span class="text-green-400 text-sm">
                                Online
                            </span>

                        </div>

                    </div>

                    <!-- LIBROS -->
                    <div class="space-y-5">

                        <div
                            class="bg-slate-800/80 border border-slate-700 rounded-2xl p-5 hover:border-blue-500 hover:scale-[1.02] transition-all duration-300">

                            <div class="flex justify-between items-center">

                                <div>

                                    <h3 class="text-xl font-semibold mb-1">
                                        📘 Ingeniería de Software
                                    </h3>

                                    <p class="text-slate-400 text-sm">
                                        Disponible para lectura digital.
                                    </p>

                                </div>

                                <span
                                    class="bg-green-500/10 text-green-400 px-3 py-1 rounded-full text-xs font-semibold">

                                    Disponible

                                </span>

                            </div>

                        </div>

                        <div
                            class="bg-slate-800/80 border border-slate-700 rounded-2xl p-5 hover:border-purple-500 hover:scale-[1.02] transition-all duration-300">

                            <div class="flex justify-between items-center">

                                <div>

                                    <h3 class="text-xl font-semibold mb-1">
                                        📗 Bases de Datos
                                    </h3>

                                    <p class="text-slate-400 text-sm">
                                        Nuevo libro agregado esta semana.
                                    </p>

                                </div>

                                <span
                                    class="bg-blue-500/10 text-blue-400 px-3 py-1 rounded-full text-xs font-semibold">

                                    Nuevo

                                </span>

                            </div>

                        </div>

                        <div
                            class="bg-slate-800/80 border border-slate-700 rounded-2xl p-5 hover:border-cyan-500 hover:scale-[1.02] transition-all duration-300">

                            <div class="flex justify-between items-center">

                                <div>

                                    <h3 class="text-xl font-semibold mb-1">
                                        📕 Desarrollo Web Moderno
                                    </h3>

                                    <p class="text-slate-400 text-sm">
                                        Acceso completo para estudiantes.
                                    </p>

                                </div>

                                <span
                                    class="bg-purple-500/10 text-purple-400 px-3 py-1 rounded-full text-xs font-semibold">

                                    Premium

                                </span>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- FOOTER -->
    <footer class="border-t border-slate-800 bg-slate-950/80 backdrop-blur py-10 mt-20">

        <div class="max-w-7xl mx-auto px-6 text-center">

            <h2 class="text-2xl font-bold mb-2">
                📚 BiblioTech
            </h2>

            <p class="text-slate-400 mb-6">
                Plataforma moderna para gestión de bibliotecas virtuales.
            </p>

            <div class="flex justify-center gap-6 text-slate-500 text-sm">

                <span>Libros</span>
                <span>Usuarios</span>
                <span>Préstamos</span>
                <span>Soporte</span>

            </div>

            <div class="mt-8 text-slate-600 text-sm">

                &copy; {{ date('Y') }} BiblioTech.
                Todos los derechos reservados.

            </div>

        </div>

    </footer>

</body>

</html>