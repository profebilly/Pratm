@extends('layouts.blog')

@section('title', 'Blog Tecnológico')

@section('content')

{{-- MODERN HERO SECTION --}}
<section class="relative bg-gradient-to-br from-blue-900 via-purple-900 to-indigo-900 text-white overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 bg-black/20">
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-blue-600/20 via-transparent to-transparent"></div>
    </div>
    
    <!-- Animated Background Elements -->
    <div class="absolute top-10 left-10 w-20 h-20 bg-blue-500/10 rounded-full blur-xl"></div>
    <div class="absolute bottom-10 right-10 w-32 h-32 bg-purple-500/10 rounded-full blur-xl"></div>
    
    <div class="relative max-w-6xl mx-auto px-4 py-28 lg:py-32">
        <div class="text-center">
            <!-- Badge -->
            <div class="inline-flex items-center px-4 py-2 rounded-full bg-white/10 backdrop-blur-sm border border-white/20 mb-8">
                <span class="w-2 h-2 bg-green-400 rounded-full mr-2 animate-pulse"></span>
                <span class="text-sm font-medium">Blog Educativo Activo</span>
            </div>

            <!-- Main Heading -->
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold mb-6 leading-tight">
                <span class="bg-gradient-to-r from-blue-200 to-purple-200 bg-clip-text text-transparent">
                    Aprende Tecnología
                </span>
                <br>
                <span class="text-white">Con Profesionales</span>
            </h1>

            <!-- Description -->
            <p class="text-xl md:text-2xl text-blue-100 max-w-3xl mx-auto leading-relaxed mb-8">
                Descubre artículos especializados en programación, desarrollo web y las últimas tendencias tecnológicas para impulsar tu carrera.
            </p>

            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center mb-12">
                <a href="#posts" 
                   class="group relative inline-flex items-center justify-center px-8 py-4 text-lg font-semibold text-white bg-blue-600 rounded-2xl hover:bg-blue-700 transition-all duration-300 shadow-lg hover:shadow-xl hover:scale-105">
                    <span>Explorar Artículos</span>
                    <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </a>
                
                <div class="flex flex-col sm:flex-row gap-4">
                    @guest
                    <a href="{{ route('register') }}" 
                       class="inline-flex items-center justify-center px-8 py-4 text-lg font-semibold text-white border-2 border-white/30 rounded-2xl hover:bg-white/10 backdrop-blur-sm transition-all duration-300 hover:scale-105">
                        <span>Unirse a la Comunidad</span>
                    </a>
                    @endguest
                    
                    <!-- NUEVO BOTÓN SOBRE NOSOTROS -->
                    <a href="{{ route('about') }}" 
                       class="inline-flex items-center justify-center px-8 py-4 text-lg font-semibold text-white border-2 border-white/30 rounded-2xl hover:bg-white/10 backdrop-blur-sm transition-all duration-300 hover:scale-105">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span>Sobre Nosotros</span>
                    </a>
                </div>
            </div>

            <!-- Stats -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 max-w-2xl mx-auto">
                <div class="text-center">
                    <div class="text-2xl md:text-3xl font-bold text-white mb-1">{{ $posts->total() }}+</div>
                    <div class="text-blue-200 text-sm">Artículos Publicados</div>
                </div>
                <div class="text-center">
                    <div class="text-2xl md:text-3xl font-bold text-white mb-1">{{ $posts->count() }}+</div>
                    <div class="text-blue-200 text-sm">Tutoriales Activos</div>
                </div>
                <div class="text-center">
                    <div class="text-2xl md:text-3xl font-bold text-white mb-1">100%</div>
                    <div class="text-blue-200 text-sm">Contenido Práctico</div>
                </div>
                <div class="text-center">
                    <div class="text-2xl md:text-3xl font-bold text-white mb-1">24/7</div>
                    <div class="text-blue-200 text-sm">Disponible</div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Scroll Indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2">
        <a href="#posts" class="animate-bounce inline-flex items-center justify-center w-10 h-10 rounded-full border-2 border-white/30 hover:border-white/50 transition-colors">
            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
            </svg>
        </a>
    </div>
</section>

{{-- INFO / INTEREST SECTION --}}
<section class="relative py-20 bg-white dark:bg-gray-900 overflow-hidden">
    <!-- Decorative Elements -->
    <div class="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-gray-200 dark:via-gray-700 to-transparent"></div>
    <div class="absolute -left-10 top-20 w-40 h-40 bg-blue-500/5 rounded-full blur-3xl"></div>
    <div class="absolute -right-10 bottom-20 w-40 h-40 bg-purple-500/5 rounded-full blur-3xl"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="text-center mb-16">
            <span class="text-blue-600 dark:text-blue-400 font-semibold tracking-wider uppercase text-sm">Nuestra Comunidad</span>
            <h2 class="mt-2 text-3xl md:text-4xl font-bold text-gray-900 dark:text-white">
                ¿Por qué unirte a <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600">Nosotros?</span>
            </h2>
            <p class="mt-4 text-xl text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                Una plataforma diseñada para conectar a toda la comunidad educativa y potenciar el aprendizaje.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 lg:gap-12">
            <!-- Card 1: Parents -->
            <div class="group relative p-8 bg-gray-50 dark:bg-gray-800 rounded-3xl hover:bg-white dark:hover:bg-gray-750 transition-all duration-300 hover:shadow-xl border border-gray-100 dark:border-gray-700">
                <div class="absolute inset-0 bg-gradient-to-br from-blue-500/5 to-purple-500/5 rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                <div class="relative z-10">
                    <div class="w-14 h-14 bg-blue-100 dark:bg-blue-900/30 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-7 h-7 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Para Padres</h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-6 leading-relaxed">
                        Mantente informado sobre el progreso académico de tus hijos, comunícate con profesores y accede a reportes en tiempo real.
                    </p>
                    <ul class="space-y-2 mb-6">
                        <li class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                            <svg class="w-4 h-4 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            Seguimiento de notas
                        </li>
                        <li class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                            <svg class="w-4 h-4 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            Comunicación directa
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Card 2: Students -->
            <div class="group relative p-8 bg-gray-50 dark:bg-gray-800 rounded-3xl hover:bg-white dark:hover:bg-gray-750 transition-all duration-300 hover:shadow-xl border border-gray-100 dark:border-gray-700">
                <div class="absolute inset-0 bg-gradient-to-br from-purple-500/5 to-pink-500/5 rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                <div class="relative z-10">
                    <div class="w-14 h-14 bg-purple-100 dark:bg-purple-900/30 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-7 h-7 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Para Estudiantes</h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-6 leading-relaxed">
                        Accede a materiales de estudio exclusivos, participa en foros de discusión y mejora tus habilidades tecnológicas.
                    </p>
                    <ul class="space-y-2 mb-6">
                        <li class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                            <svg class="w-4 h-4 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            Recursos exclusivos
                        </li>
                        <li class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                            <svg class="w-4 h-4 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            Aprendizaje colaborativo
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Card 3: Visitors -->
            <div class="group relative p-8 bg-gray-50 dark:bg-gray-800 rounded-3xl hover:bg-white dark:hover:bg-gray-750 transition-all duration-300 hover:shadow-xl border border-gray-100 dark:border-gray-700">
                <div class="absolute inset-0 bg-gradient-to-br from-indigo-500/5 to-blue-500/5 rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                <div class="relative z-10">
                    <div class="w-14 h-14 bg-indigo-100 dark:bg-indigo-900/30 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-7 h-7 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Visitantes</h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-6 leading-relaxed">
                        Explora nuestros artículos públicos, entérate de las últimas noticias y eventos de la institución.
                    </p>
                    <ul class="space-y-2 mb-6">
                        <li class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                            <svg class="w-4 h-4 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            Noticias recientes
                        </li>
                        <li class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                            <svg class="w-4 h-4 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            Eventos abiertos
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- FEATURED POSTS SECTION --}}
<section id="posts" class="py-24 bg-gray-50 dark:bg-gray-900 relative">
    <!-- Background Decoration -->
    <div class="absolute inset-0 bg-[radial-gradient(#e5e7eb_1px,transparent_1px)] [background-size:16px_16px] opacity-30 dark:opacity-5"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Section Header -->
        <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-6">
            <div class="max-w-2xl">
                <span class="text-blue-600 dark:text-blue-400 font-semibold tracking-wider uppercase text-sm">Blog & Noticias</span>
                <h2 class="mt-2 text-4xl md:text-5xl font-bold text-gray-900 dark:text-white leading-tight">
                    Últimos <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600">Artículos</span>
                </h2>
                <p class="mt-4 text-xl text-gray-600 dark:text-gray-300">
                    Descubre contenido actualizado sobre desarrollo web, programación y mejores prácticas.
                </p>
            </div>
            
            <a href="#" class="hidden md:inline-flex items-center justify-center px-6 py-3 text-base font-medium text-blue-600 bg-blue-50 hover:bg-blue-100 rounded-xl transition-colors duration-300">
                Ver todos los artículos
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>

        <!-- Posts Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($posts as $post)
            <article class="group flex flex-col h-full bg-white dark:bg-gray-800 rounded-[2rem] shadow-sm hover:shadow-2xl transition-all duration-500 overflow-hidden border border-gray-100 dark:border-gray-700 hover:-translate-y-2">
                <!-- Image Container -->
                <div class="relative h-64 overflow-hidden">
                    <img 
                        src="{{ $post->image ? asset('storage/'.$post->image) : 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=600&q=80' }}" 
                        alt="{{ $post->title }}"
                        class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700"
                    >
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900/80 via-gray-900/20 to-transparent opacity-60 group-hover:opacity-40 transition-opacity duration-300"></div>
                    
                    <!-- Category Badges -->
                    <div class="absolute top-4 left-4 flex flex-wrap gap-2">
                        @foreach($post->categories as $cat)
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-white/90 text-gray-900 backdrop-blur-md shadow-lg">
                            {{ $cat->name }}
                        </span>
                        @endforeach
                    </div>
                </div>

                <!-- Content -->
                <div class="flex-1 p-8 flex flex-col">
                    <!-- Meta -->
                    <div class="flex items-center gap-4 text-sm text-gray-500 dark:text-gray-400 mb-4">
                        <span class="flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            {{ $post->created_at->format('d M Y') }}
                        </span>
                        <span class="flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            {{ ceil(str_word_count(strip_tags($post->body)) / 200) }} min lectura
                        </span>
                    </div>

                    <!-- Title -->
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-3 line-clamp-2 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">
                        <a href="{{ route('posts.show', $post->slug) }}">
                            {{ $post->title }}
                        </a>
                    </h3>

                    <!-- Excerpt -->
                    <p class="text-gray-600 dark:text-gray-300 mb-6 line-clamp-3 flex-1 leading-relaxed">
                        {{ \Illuminate\Support\Str::limit(strip_tags($post->body), 120) }}
                    </p>

                    <!-- Footer -->
                    <div class="flex items-center justify-between pt-6 border-t border-gray-100 dark:border-gray-700 mt-auto">
                        <div class="flex items-center space-x-3">
                            <img 
                                src="https://ui-avatars.com/api/?name={{ urlencode($post->user->name) }}&background=random&color=fff&size=128" 
                                alt="{{ $post->user->name }}"
                                class="w-10 h-10 rounded-full border-2 border-white dark:border-gray-800 shadow-md"
                            >
                            <div>
                                <p class="text-sm font-bold text-gray-900 dark:text-white">
                                    {{ $post->user->name }}
                                </p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">Autor</p>
                            </div>
                        </div>
                        
                        <a href="{{ route('posts.show', $post->slug) }}" 
                           class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-blue-50 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 group-hover:bg-blue-600 group-hover:text-white transition-all duration-300">
                            <svg class="w-5 h-5 transform group-hover:translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </article>
            @endforeach
        </div>

        <!-- Load More / Pagination -->
        @if($posts->hasPages())
        <div class="text-center mt-16">
            <div class="inline-flex rounded-2xl bg-white dark:bg-gray-800 shadow-lg border border-gray-100 dark:border-gray-700 p-2">
                {{ $posts->links() }}
            </div>
        </div>
        @endif

        <!-- Empty State -->
        @if($posts->isEmpty())
        <div class="text-center py-24">
            <div class="w-24 h-24 mx-auto mb-6 bg-gray-100 dark:bg-gray-800 rounded-full flex items-center justify-center animate-pulse">
                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                </svg>
            </div>
            <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">No hay artículos aún</h3>
            <p class="text-gray-600 dark:text-gray-300 max-w-md mx-auto">
                Estamos preparando contenido increíble para ti. ¡Vuelve pronto!
            </p>
        </div>
        @endif
    </div>
</section>

@endsection