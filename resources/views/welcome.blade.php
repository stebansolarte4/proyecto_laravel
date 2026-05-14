<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>BiblioPremium | El Placer de Leer</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- AOS Animations -->
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #fdfcfb;
        }

        .hero-bg {
            background: linear-gradient(
                rgba(0,0,0,0.65),
                rgba(0,0,0,0.65)
            ),
            url('https://images.unsplash.com/photo-1507842217343-583bb7270b66?q=80&w=1200&auto=format&fit=crop');
            background-size: cover;
            background-position: center;
        }

        .glass {
            backdrop-filter: blur(12px);
            background: rgba(255,255,255,0.05);
        }
    </style>
</head>

<body class="text-gray-800">

    <!-- NAVBAR -->
    <nav class="fixed top-0 w-full z-50 glass border-b border-white/10">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

            <h1 class="text-3xl font-bold text-white tracking-tight">
                INMA<span class="text-amber-500">CLOUD</span>
            </h1>

            <div class="space-x-6">
                @if (Route::has('login'))
                    @auth
                    <a href="{{ url('/dashboard') }}" class="text-white hover:text-amber-400 transition">Dashboard</a>
                    @else
                       
                        <a href="{{ route('login') }}" class="text-white hover:text-amber-400 transition font-medium">Iniciar Sesión</a>
                      
                    @endauth
                @endif
            </div>
        </div>
    </nav>

    <!-- HERO -->
    <section class="hero-bg min-h-screen flex items-center justify-center">
        <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-2 gap-12 items-center">

            <!-- TEXT -->
            <div data-aos="fade-right">
               

                <h1 class="text-5xl lg:text-7xl font-extrabold text-white mt-6 leading-tight">
                    Donde las historias <br>
                    <span class="text-amber-500">cobran vida</span>
                </h1>

                <p class="text-gray-200 text-lg mt-6 leading-relaxed">
                    Sumérgete en un catálogo curado de más de 50,000 títulos. Desde clásicos inmortales hasta las últimas tendencias literarias en un ambiente diseñado para el lector exigente.
                </p>

                <div class="mt-10 flex flex-wrap gap-5">
                
                    <a href="#servicios"
                       class="border border-white/50 text-white px-8 py-4 rounded-2xl font-semibold hover:bg-white hover:text-black transition text-center">
                        Nuestros Servicios
                    </a>
                </div>
            </div>

            <!-- CARD VISUAL -->
            <div data-aos="fade-left" class="hidden lg:block">
                <div class="bg-white/10 backdrop-blur-md p-4 rounded-[2.5rem] border border-white/20">
                    <div class="bg-white rounded-[2rem] shadow-2xl overflow-hidden">
                        <img
                            src="https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?q=80&w=1200&auto=format&fit=crop"
                            class="w-full h-[500px] object-cover"
                            alt="Interior de biblioteca"
                        >
                        <div class="p-8">
                            <h2 class="text-2xl font-bold text-gray-800">Círculo de Lectura</h2>
                            <p class="text-gray-600 mt-2">Beneficios exclusivos para miembros de nuestra comunidad literaria.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- FEATURES -->
    <section id="servicios" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6">

            <div class="text-center mb-20" data-aos="fade-up">
                <h2 class="text-4xl lg:text-5xl font-bold text-gray-900">
                    Experiencia Literaria Superior
                </h2>
                <p class="text-gray-500 mt-4 text-xl">Más que una biblioteca, un santuario para el conocimiento.</p>
            </div>

            <div class="grid md:grid-cols-3 gap-10">

                <!-- ITEM 1 -->
                <div class="bg-orange-50/50 p-10 rounded-[2rem] border border-orange-100 hover:shadow-2xl hover:-translate-y-3 transition-all duration-300"
                     data-aos="zoom-in">
                    <div class="w-16 h-16 bg-amber-600 rounded-2xl flex items-center justify-center text-3xl mb-6 shadow-lg shadow-amber-200">📚</div>
                    <h3 class="text-2xl font-bold mb-4 text-gray-800">Préstamo Digital</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Accede a todos nuestros libros desde cualquier dispositivo.
                    </p>
                </div>

                <!-- ITEM 2 -->
                <div class="bg-orange-50/50 p-10 rounded-[2rem] border border-orange-100 hover:shadow-2xl hover:-translate-y-3 transition-all duration-300"
                     data-aos="zoom-in" data-aos-delay="100">
                    <div class="w-16 h-16 bg-amber-600 rounded-2xl flex items-center justify-center text-3xl mb-6 shadow-lg shadow-amber-200">📚</div>
                    <h3 class="text-2xl font-bold mb-4 text-gray-800">Zonas de Estudio</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Espacios silenciosos y conexión de alta velocidad para tu productividad.
                    </p>
                </div>

        
            </div>
        </div>
    </section>



    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true,
            easing: 'ease-out-quad'
        });
    </script>

</body>
</html>