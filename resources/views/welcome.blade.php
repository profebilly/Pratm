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

{{-- FEATURED POSTS SECTION --}}
<section id="posts" class="py-20 bg-gray-50 dark:bg-gray-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-4">
                Últimos <span class="text-blue-600 dark:text-blue-400">Artículos</span>
            </h2>
            <p class="text-xl text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                Descubre contenido actualizado sobre desarrollo web, programación y mejores prácticas en tecnología.
            </p>
        </div>

        <!-- Posts Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($posts as $post)
            <article class="group bg-white dark:bg-gray-800 rounded-3xl shadow-sm hover:shadow-2xl transition-all duration-500 overflow-hidden border border-gray-100 dark:border-gray-700 hover:scale-105">
                <!-- Image Container -->
                <div class="relative overflow-hidden">
                    <img 
                        src="{{ $post->image ? asset('storage/'.$post->image) : 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=600&q=80' }}" 
                        alt="{{ $post->title }}"
                        class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-700"
                    >
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    
                    <!-- Category Badges -->
                    <div class="absolute top-4 left-4 flex flex-wrap gap-2">
                        @foreach($post->categories as $cat)
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-600 text-white backdrop-blur-sm">
                            {{ $cat->name }}
                        </span>
                        @endforeach
                    </div>
                    
                    <!-- Read Time -->
                    <div class="absolute top-4 right-4">
                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-black/50 text-white backdrop-blur-sm">
                            📖 {{ ceil(str_word_count(strip_tags($post->body)) / 200) }} min
                        </span>
                    </div>
                </div>

                <!-- Content -->
                <div class="p-6">
                    <!-- Title -->
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3 line-clamp-2 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">
                        {{ $post->title }}
                    </h3>

                    <!-- Excerpt -->
                    <p class="text-gray-600 dark:text-gray-300 text-sm mb-4 line-clamp-3 leading-relaxed">
                        {{ \Illuminate\Support\Str::limit(strip_tags($post->body), 120) }}
                    </p>

                    <!-- Author & Date -->
                    <div class="flex items-center justify-between pt-4 border-t border-gray-100 dark:border-gray-700">
                        <div class="flex items-center space-x-3">
                            <img 
                                src="https://ui-avatars.com/api/?name={{ urlencode($post->user->name) }}&background=6366f1&color=fff&size=128" 
                                alt="{{ $post->user->name }}"
                                class="w-8 h-8 rounded-full border-2 border-blue-200 dark:border-blue-800"
                            >
                            <div>
                                <p class="text-sm font-medium text-gray-900 dark:text-white">
                                    {{ $post->user->name }}
                                </p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">
                                    {{ $post->created_at->format('d M Y') }}
                                </p>
                            </div>
                        </div>
                        
                        <!-- Read More -->
                        <a href="{{ route('posts.show', $post->slug) }}" 
                           class="inline-flex items-center text-blue-600 dark:text-blue-400 font-semibold text-sm hover:text-blue-700 dark:hover:text-blue-300 transition-colors group/link">
                            Leer más
                            <svg class="w-4 h-4 ml-1 group-hover/link:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
        <div class="text-center mt-12">
            <div class="inline-flex rounded-2xl bg-white dark:bg-gray-800 shadow-sm border border-gray-200 dark:border-gray-700">
                {{ $posts->links() }}
            </div>
        </div>
        @endif

        <!-- Empty State -->
        @if($posts->isEmpty())
        <div class="text-center py-16">
            <div class="w-24 h-24 mx-auto mb-6 bg-gray-100 dark:bg-gray-800 rounded-full flex items-center justify-center">
                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
            </div>
            <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">No hay artículos aún</h3>
            <p class="text-gray-600 dark:text-gray-300 max-w-md mx-auto">
                Próximamente publicaremos contenido educativo sobre tecnología y programación.
            </p>
        </div>
        @endif
    </div>
</section>

@endsection