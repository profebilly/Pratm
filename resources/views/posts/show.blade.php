@extends('layouts.blog')

@section('meta')
    <meta property="og:title" content="{{ $post->title }}" />
    <meta property="og:description" content="{{ \Illuminate\Support\Str::limit(strip_tags($post->body), 160) }}" />
    <meta property="og:image" content="{{ $post->image ? asset('storage/'.$post->image) : 'https://via.placeholder.com/1200x600' }}" />

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="{{ $post->title }}" />
    <meta name="twitter:description" content="{{ \Illuminate\Support\Str::limit(strip_tags($post->body), 160) }}" />
    <meta name="twitter:image" content="{{ $post->image ? asset('storage/'.$post->image) : 'https://via.placeholder.com/1200x600' }}" />
@endsection

@section('title', $post->title)

@section('content')
<div class="max-w-5xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
    <article class="bg-white dark:bg-gray-800 shadow-xl rounded-lg overflow-hidden">

        {{-- HERO --}}
        <div class="relative">
            <img class="w-full h-80 object-cover"
                src="{{ $post->image ? asset('storage/'.$post->image) : 'https://via.placeholder.com/1200x600' }}"
                alt="{{ $post->title }}">

            <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent opacity-60"></div>

            <div class="absolute left-6 bottom-6 text-white">
                <h1 class="text-3xl md:text-4xl font-extrabold">{{ $post->title }}</h1>

                <p class="mt-2 text-sm opacity-90">
                    {{ \Illuminate\Support\Str::limit(strip_tags($post->body), 160) }}
                </p>
            </div>
        </div>

        {{-- POST META --}}
        <div class="p-8">

            <div class="flex flex-col md:flex-row justify-between md:items-center mb-6">
                <div class="flex items-center space-x-4">
                    <img class="h-12 w-12 rounded-full"
                        src="https://ui-avatars.com/api/?name={{ urlencode($post->user->name) }}"
                        alt="{{ $post->user->name }}">

                    <div>
                        <p class="text-sm font-medium text-gray-900 dark:text-white">{{ $post->user->name }}</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">
                            {{ $post->created_at->format('d/m/Y') }}
                        </p>
                    </div>
                </div>

                {{-- Reading time --}}
                <div class="mt-4 md:mt-0 text-sm text-gray-600 dark:text-gray-300">
                    @php
                        $words = str_word_count(strip_tags($post->body));
                        $minutes = max(1, ceil($words / 200));
                    @endphp
                    Tiempo de lectura: <strong>{{ $minutes }} min</strong>
                </div>
            </div>

            {{-- Categories --}}
            <div class="mb-6">
                @foreach($post->categories as $category)
                    <span class="inline-block px-3 py-1 mr-2 mb-2 bg-indigo-100 dark:bg-indigo-900 rounded-full text-indigo-800 dark:text-indigo-200 text-sm font-semibold">
                        {{ $category->name }}
                    </span>
                @endforeach
            </div>

            {{-- POST BODY --}}
            <div class="prose lg:prose-xl dark:prose-invert max-w-none text-gray-700 dark:text-gray-300 leading-relaxed">
                {!! nl2br(e($post->body)) !!}
            </div>

            {{-- RELATED POSTS --}}
            <div class="mt-12">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">Artículos relacionados</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @forelse($related as $r)
                        <div class="p-4 bg-white dark:bg-gray-700 rounded-lg shadow">
                            <a href="{{ route('posts.show', $r->slug) }}"
                                class="text-indigo-600 hover:underline font-medium text-sm">
                                {{ $r->title }}
                            </a>
                            <p class="text-xs text-gray-500 dark:text-gray-300">
                                {{ \Illuminate\Support\Str::limit(strip_tags($r->body), 80) }}
                            </p>
                        </div>
                    @empty
                        <p class="text-gray-500">No se encontraron artículos relacionados.</p>
                    @endforelse
                </div>
            </div>

            {{-- COMMENTS --}}
            <div class="mt-12">
                <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">
                    Comentarios ({{ $post->comments->count() }})
                </h3>

                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow">

                    {{-- Show comments --}}
                    @forelse($post->comments as $comment)
                        <div class="mb-4 flex">
                            <img class="h-10 w-10 rounded-full mr-3"
                                src="https://ui-avatars.com/api/?name={{ urlencode($comment->user->name) }}"
                                alt="avatar">

                            <div>
                                <p class="font-medium text-sm text-gray-900 dark:text-white">
                                    {{ $comment->user->name }}
                                </p>

                                <p class="text-xs text-gray-500 dark:text-gray-400">
                                    {{ $comment->created_at->diffForHumans() }}
                                </p>

                                <p class="text-sm text-gray-700 dark:text-gray-300">
                                    {{ $comment->body }}
                                </p>
                            </div>
                        </div>
                    @empty
                        <p class="text-gray-500">No hay comentarios todavía.</p>
                    @endforelse

                    {{-- Add comment --}}
                    @auth
                        <form action="{{ route('posts.comments.store', $post->id) }}" method="POST" class="mt-6">
                            @csrf

                            <label class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">
                                Agregar comentario
                            </label>

                            <textarea name="body" rows="3" required
                                class="w-full rounded border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white"></textarea>

                            @error('body')
                                <p class="text-red-600 text-sm">{{ $message }}</p>
                            @enderror

                            <button type="submit"
                                class="mt-3 px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded">
                                Enviar
                            </button>
                        </form>
                    @else
                        <p class="text-gray-500">
                            Debes <a href="{{ route('login') }}" class="text-indigo-600 underline">iniciar sesión</a> para comentar.
                        </p>
                    @endauth

                </div>
            </div>
        </div>
    </article>
</div>
@endsection
