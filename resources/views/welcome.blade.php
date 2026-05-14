<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Chocolate Premium | Welcome</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- AOS Animations -->
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body{
            font-family: 'Poppins', sans-serif;
            background: #fffaf5;
        }

        .hero-bg{
            background: linear-gradient(
                rgba(0,0,0,0.55),
                rgba(0,0,0,0.55)
            ),
            url('https://images.unsplash.com/photo-1549007994-cb92caebd54b?q=80&w=1200&auto=format&fit=crop');
            background-size: cover;
            background-position: center;
        }

        .glass{
            backdrop-filter: blur(10px);
            background: rgba(255,255,255,0.1);
        }
    </style>
</head>

<body class="text-gray-800">

    <!-- NAVBAR -->
    <nav class="fixed top-0 w-full z-50 glass border-b border-white/20">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

            <h1 class="text-3xl font-bold text-white">
                CACAO<span class="text-orange-400">PURO</span>
            </h1>

            <div class="space-x-4">
                @if (Route::has('login'))

                    @auth
                        <a href="{{ url('/dashboard') }}"
                           class="text-white hover:text-orange-300 transition">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                           class="text-white hover:text-orange-300 transition">
                            Iniciar Sesión
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                               class="bg-orange-500 hover:bg-orange-600 text-white px-5 py-2 rounded-xl font-semibold shadow-lg transition">
                                Registrarse
                            </a>
                        @endif

                    @endauth
                @endif
            </div>
        </div>
    </nav>

    <!-- HERO -->
    <section class="hero-bg min-h-screen flex items-center justify-center">

        <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-2 gap-10 items-center">

            <!-- TEXT -->
            <div data-aos="fade-right">

                <span class="bg-orange-500 text-white px-4 py-2 rounded-full text-sm font-medium">
                    Chocolate Orgánico Premium
                </span>

                <h1 class="text-5xl lg:text-7xl font-extrabold text-white mt-6 leading-tight">
                    El verdadero sabor del
                    <span class="text-orange-400">
                        cacao artesanal
                    </span>
                </h1>

                <p class="text-gray-200 text-lg mt-6 leading-relaxed">
                    Descubre chocolates elaborados con cacao 100% orgánico,
                    cultivado de manera sostenible y transformado en experiencias
                    únicas para tu paladar.
                </p>

                <div class="mt-8 flex flex-wrap gap-4">

                    <a href="{{ route('register') }}"
                       class="bg-orange-500 hover:bg-orange-600 text-white px-8 py-4 rounded-2xl font-bold shadow-2xl transition transform hover:scale-105">
                        Empezar Ahora
                    </a>

                    <a href="#productos"
                       class="border border-white text-white px-8 py-4 rounded-2xl font-semibold hover:bg-white hover:text-black transition">
                        Ver Productos
                    </a>

                </div>
            </div>

            <!-- CARD -->
            <div data-aos="fade-left">

                <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">

                    <img
                        src="https://images.unsplash.com/photo-1511381939415-e44015466834?q=80&w=1200&auto=format&fit=crop"
                        class="w-full h-[450px] object-cover"
                        alt="Chocolate"
                    >

                    <div class="p-8">

                        <h2 class="text-3xl font-bold text-gray-800">
                            Calidad Premium
                        </h2>

                        <p class="text-gray-600 mt-4">
                            Nuestros productos combinan tradición,
                            sostenibilidad y el mejor cacao natural
                            para crear chocolates inolvidables.
                        </p>

                        <div class="mt-6 flex gap-4">

                            <div class="bg-orange-100 text-orange-700 px-4 py-2 rounded-xl font-semibold">
                                100% Orgánico
                            </div>

                            <div class="bg-gray-100 text-gray-700 px-4 py-2 rounded-xl font-semibold">
                                Premium
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- FEATURES -->
    <section id="productos" class="py-24 bg-white">

        <div class="max-w-7xl mx-auto px-6">

            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-5xl font-bold text-gray-900">
                    ¿Por qué elegirnos?
                </h2>

                <p class="text-gray-600 mt-4 text-lg">
                    Experiencia, calidad y pasión por el cacao.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">

                <div class="bg-orange-50 p-8 rounded-3xl shadow-lg hover:-translate-y-2 transition"
                     data-aos="zoom-in">

                    <div class="text-5xl mb-4">🍫</div>

                    <h3 class="text-2xl font-bold mb-3">
                        Sabor Artesanal
                    </h3>

                    <p class="text-gray-600">
                        Chocolates elaborados cuidadosamente con recetas exclusivas.
                    </p>

                </div>

                <div class="bg-orange-50 p-8 rounded-3xl shadow-lg hover:-translate-y-2 transition"
                     data-aos="zoom-in"
                     data-aos-delay="150">

                    <div class="text-5xl mb-4">🌱</div>

                    <h3 class="text-2xl font-bold mb-3">
                        Producción Sostenible
                    </h3>

                    <p class="text-gray-600">
                        Trabajamos directamente con cultivos responsables y ecológicos.
                    </p>

                </div>

                <div class="bg-orange-50 p-8 rounded-3xl shadow-lg hover:-translate-y-2 transition"
                     data-aos="zoom-in"
                     data-aos-delay="300">

                    <div class="text-5xl mb-4">🏆</div>

                    <h3 class="text-2xl font-bold mb-3">
                        Calidad Garantizada
                    </h3>

                    <p class="text-gray-600">
                        Productos premium seleccionados para los amantes del chocolate.
                    </p>

                </div>

            </div>

        </div>

    </section>

    <!-- FOOTER -->
    <footer class="bg-gray-900 text-gray-300 py-10">

        <div class="max-w-7xl mx-auto px-6 text-center">

            <h2 class="text-3xl font-bold text-white">
                CACAO<span class="text-orange-400">PURO</span>
            </h2>

            <p class="mt-4">
                Chocolate orgánico de alta calidad.
            </p>

            <div class="border-t border-gray-700 mt-8 pt-6 text-sm">
                &copy; {{ date('Y') }} Cacao Puro. Todos los derechos reservados.
            </div>

        </div>

    </footer>

    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

    <script>
        AOS.init({
            duration: 1000,
            once: true
        });
    </script>

</body>
</html>