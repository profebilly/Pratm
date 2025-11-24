@extends('layouts.blog')

@section('title', 'Blog Tecnológico')

@section('content')

{{-- HERO SECTION --}}
<div class="relative bg-gray-900 text-white py-24 mb-12">
    <div class="absolute inset-0 bg-cover bg-center opacity-30"
         style="background-image: url('https://images.unsplash.com/photo-1503676260728-1c00da094a0b');">
    </div>

    <div class="relative max-w-5xl mx-auto text-center px-6">
        <h1 class="text-4xl md:text-6xl font-extrabold drop-shadow-lg">
            Bienvenido a mi Blog Educativo
        </h1>

        <p class="mt-4 text-lg md:text-2xl opacity-90">
            Tecnología, programación y recursos de aprendizaje técnico profesional.
        </p>

        <a href="#posts"
           class="mt-6 inline-block bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-full text-lg shadow-lg transition">
            Explorar Artículos
        </a>
    </div>
</div>

{{-- POSTS GRID --}}
<div id="posts" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <h2 class="text-3xl font-bold mb-8 text-gray-800 dark:text-white">
        Últimos Artículos
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($posts as $post)
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition">

                {{-- IMAGE --}}
                <div class="relative">
                    <img src="{{ $post->image ? asset('storage/'.$post->image) : 'https://via.placeholder.com/600x400' }}"
                         class="h-48 w-full object-cover" alt="">

                    <div class="absolute inset-0 bg-black/20"></div>
                </div>

                {{-- CONTENT --}}
                <div class="p-6">

                    {{-- CATEGORY TAGS --}}
                    <div class="mb-3">
                        @foreach($post->categories as $cat)
                            <span class="text-xs inline-block bg-indigo-100 dark:bg-indigo-900 text-indigo-700 dark:text-indigo-300 px-3 py-1 rounded-full mr-1">
                                {{ $cat->name }}
                            </span>
                        @endforeach
                    </div>

                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">
                        {{ $post->title }}
                    </h3>

                    <p class="text-gray-600 dark:text-gray-300 text-sm mb-4">
                        {{ \Illuminate\Support\Str::limit(strip_tags($post->body), 120) }}
                    </p>

                    <a href="{{ route('posts.show', $post->slug) }}"
                       class="inline-block text-indigo-600 dark:text-indigo-400 font-semibold hover:underline">
                        Leer más →
                    </a>
                </div>

                {{-- AUTHOR --}}
                <div class="px-6 pb-6 flex items-center mt-4">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode($post->user->name) }}"
                         class="w-10 h-10 rounded-full" alt="">
                    <div class="ml-3">
                        <p class="text-sm font-medium text-gray-700 dark:text-gray-200">
                            {{ $post->user->name }}
                        </p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">
                            {{ $post->created_at->format('d M Y') }}
                        </p>
                    </div>
                </div>

            </div>
        @endforeach
    </div>

    <div class="mt-10">
        {{ $posts->links() }}
    </div>
</div>

@endsection
