@extends('layouts.blog')

@section('title', 'Detalle del Estudiante')

@section('content')
<div class="min-h-screen bg-gray-50 dark:bg-gray-900 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header -->
        <div class="mb-8 flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white">{{ $student->name }}</h1>
                <p class="mt-2 text-gray-600 dark:text-gray-400">{{ $student->email }}</p>
            </div>
            <a href="{{ route('teacher.students') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm text-sm font-medium text-gray-700 dark:text-gray-200 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                ← Volver a Lista
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left Column: Info & Parents -->
            <div class="lg:col-span-1 space-y-8">
                
                <!-- Student Info Card -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                    <div class="flex flex-col items-center">
                        @php 
                            $avatar = $student->avatar ? asset('storage/' . $student->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode($student->name) . '&background=6366f1&color=fff';
                        @endphp
                        <img class="h-32 w-32 rounded-full mb-4" src="{{ $avatar }}" alt="{{ $student->name }}">
                        <h2 class="text-xl font-bold text-gray-900 dark:text-white">{{ $student->name }}</h2>
                        <span class="mt-2 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                            Estudiante
                        </span>
                    </div>
                    <div class="mt-6 border-t border-gray-200 dark:border-gray-700 pt-4">
                        <dl class="space-y-3">
                            <div>
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Email</dt>
                                <dd class="text-sm text-gray-900 dark:text-white">{{ $student->email }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Registrado el</dt>
                                <dd class="text-sm text-gray-900 dark:text-white">{{ $student->created_at->format('d/m/Y') }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Cédula</dt>
                                <dd class="text-sm text-gray-900 dark:text-white">{{ $student->cedula ?? 'No registrada' }}</dd>
                            </div>
                        </dl>
                    </div>
                </div>

                <!-- Parents / Family Section -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Familiares / Tutores</h3>
                    
                    <!-- List of Parents -->
                    <ul class="divide-y divide-gray-200 dark:divide-gray-700 mb-6">
                        @forelse($student->parents as $parent)
                        <li class="py-3 flex justify-between items-center">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <span class="inline-block h-8 w-8 rounded-full overflow-hidden bg-gray-100">
                                        <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                        </svg>
                                    </span>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-900 dark:text-white">{{ $parent->name }}</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">{{ $parent->email }}</p>
                                </div>
                            </div>
                            <form action="{{ route('student_parent.destroy') }}" method="POST" onsubmit="return confirm('¿Estás seguro de desvincular este familiar?');">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="student_id" value="{{ $student->id }}">
                                <input type="hidden" name="parent_id" value="{{ $parent->id }}">
                                <button type="submit" class="text-red-600 hover:text-red-900 dark:hover:text-red-400 text-xs">
                                    Desvincular
                                </button>
                            </form>
                        </li>
                        @empty
                        <li class="py-3 text-sm text-gray-500 dark:text-gray-400 text-center">
                            No hay familiares asignados.
                        </li>
                        @endforelse
                    </ul>

                    <!-- Add Parent Form -->
                    <form action="{{ route('student_parent.store') }}" method="POST" class="mt-4">
                        @csrf
                        <input type="hidden" name="student_id" value="{{ $student->id }}">
                        <div>
                            <label for="parent_email" class="block text-xs font-medium text-gray-700 dark:text-gray-300">Agregar Familiar (Email)</label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <input type="email" name="parent_email" id="parent_email" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-l-md sm:text-sm border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-white" placeholder="email@padre.com" required>
                                <button type="submit" class="inline-flex items-center px-3 py-2 border border-l-0 border-gray-300 dark:border-gray-600 rounded-r-md bg-gray-50 dark:bg-gray-600 text-gray-500 dark:text-gray-200 text-sm hover:bg-gray-100 dark:hover:bg-gray-500">
                                    Agregar
                                </button>
                            </div>
                            @error('parent_email')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </form>
                </div>
            </div>

            <!-- Right Column: Activity -->
            <div class="lg:col-span-2 space-y-8">
                <!-- Recent Posts -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white">Publicaciones Recientes</h3>
                    </div>
                    <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                        @forelse($student->posts as $post)
                        <li class="px-6 py-4">
                            <div class="flex justify-between">
                                <a href="{{ route('posts.show', $post->slug) }}" class="text-indigo-600 hover:text-indigo-900 dark:hover:text-indigo-400 font-medium">
                                    {{ $post->title }}
                                </a>
                                <span class="text-sm text-gray-500 dark:text-gray-400">{{ $post->created_at->format('d/m/Y') }}</span>
                            </div>
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400 line-clamp-2">
                                {{ Str::limit(strip_tags($post->body), 150) }}
                            </p>
                        </li>
                        @empty
                        <li class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                            Este estudiante no ha realizado publicaciones.
                        </li>
                        @endforelse
                    </ul>
                </div>

                <!-- Recent Comments -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white">Comentarios Recientes</h3>
                    </div>
                    <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                        @forelse($student->comments as $comment)
                        <li class="px-6 py-4">
                            <div class="text-sm text-gray-900 dark:text-white">
                                En <a href="{{ route('posts.show', $comment->post->slug) }}" class="font-medium text-indigo-600 hover:text-indigo-500">{{ $comment->post->title }}</a>
                            </div>
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                "{{ Str::limit($comment->body, 100) }}"
                            </p>
                            <div class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                                {{ $comment->created_at->diffForHumans() }}
                            </div>
                        </li>
                        @empty
                        <li class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                            Este estudiante no ha realizado comentarios.
                        </li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
