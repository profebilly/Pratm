@extends('layouts.blog')

@section('title', 'Panel del Profesor')

@section('content')
<div class="min-h-screen bg-gray-50 dark:bg-gray-900 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Panel del Profesor</h1>
            <p class="mt-2 text-gray-600 dark:text-gray-400">Bienvenido, {{ auth()->user()->name }}</p>
        </div>

        <!-- Stats Grid con datos reales -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Total de Publicaciones -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6 flex items-center">
                <div class="p-3 rounded-full bg-indigo-100 text-indigo-500 dark:bg-indigo-900 dark:text-indigo-300 mr-4">
                    <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total de Publicaciones</p>
                    <p class="text-2xl font-semibold text-gray-900 dark:text-white">{{ $teacherStats['my_posts'] ?? 0 }}</p>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                        {{ $teacherStats['my_published_posts'] ?? 0 }} publicados
                    </p>
                </div>
            </div>

            <!-- Estudiantes -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6 flex items-center">
                <div class="p-3 rounded-full bg-green-100 text-green-500 dark:bg-green-900 dark:text-green-300 mr-4">
                    <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Estudiantes</p>
                    <p class="text-2xl font-semibold text-gray-900 dark:text-white">{{ $userStats['total_students'] ?? 0 }}</p>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">En el sistema</p>
                </div>
            </div>

            <!-- Comentarios -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6 flex items-center">
                <div class="p-3 rounded-full bg-blue-100 text-blue-500 dark:bg-blue-900 dark:text-blue-300 mr-4">
                    <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Comentarios</p>
                    <p class="text-2xl font-semibold text-gray-900 dark:text-white">{{ $contentStats['total_comments'] ?? 0 }}</p>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">En mis posts</p>
                </div>
            </div>

            <!-- Borradores -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6 flex items-center">
                <div class="p-3 rounded-full bg-yellow-100 text-yellow-500 dark:bg-yellow-900 dark:text-yellow-300 mr-4">
                    <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Borradores</p>
                    <p class="text-2xl font-semibold text-gray-900 dark:text-white">{{ $teacherStats['my_draft_posts'] ?? 0 }}</p>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Por publicar</p>
                </div>
            </div>
        </div>

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- Acciones Rápidas -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow">
                <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white">Acciones Rápidas</h3>
                </div>
                <div class="p-6 space-y-4">
                    <a href="{{ route('teacher.posts.create') }}" class="w-full inline-flex items-center justify-center px-4 py-3 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors">
                        <svg class="-ml-1 mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Crear Nuevo Post
                    </a>
                    
                    <a href="{{ route('teacher.students') }}" class="w-full flex items-center justify-center px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm text-sm font-medium text-gray-700 dark:text-gray-200 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors">
                        <svg class="-ml-1 mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        Ver Estudiantes
                    </a>

                    <!-- NUEVO: Botón para autorizar estudiante con padre/tutor -->
                    <button onclick="openAuthorizationModal()" class="w-full flex items-center justify-center px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm text-sm font-medium text-gray-700 dark:text-gray-200 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors">
                        <svg class="-ml-1 mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Autorizar Nuevo Estudiante
                    </button>

                    <a href="{{ route('teacher.materials') }}" class="w-full flex items-center justify-center px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm text-sm font-medium text-gray-700 dark:text-gray-200 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors">
                        <svg class="-ml-1 mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                        Materiales de Clase
                    </a>

                    <a href="#" class="w-full flex items-center justify-center px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm text-sm font-medium text-gray-700 dark:text-gray-200 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors">
                        <svg class="-ml-1 mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        Calendario Escolar
                    </a>
                </div>
            </div>

            <!-- Publicaciones Recientes -->
            <div class="lg:col-span-2 bg-white dark:bg-gray-800 rounded-lg shadow">
                <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700 flex justify-between items-center">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white">Mis Publicaciones Recientes</h3>
                    <a href="#" class="text-sm text-indigo-600 dark:text-indigo-400 hover:text-indigo-900 dark:hover:text-indigo-300">Ver todas</a>
                </div>
                <div class="overflow-x-auto">
                    @if(isset($recentPosts) && $recentPosts->count() > 0)
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Título</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Estado</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Fecha</th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Acciones</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach($recentPosts as $post)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900 dark:text-white">
                                        {{ Str::limit($post->title, 40) }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                        {{ $post->status == 'published' ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : 
                                           ($post->status == 'draft' ? 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200' : 
                                           'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300') }}">
                                        {{ $post->status }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                    {{ $post->created_at->format('M d, Y') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="#" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-900 dark:hover:text-indigo-300 mr-3">Editar</a>
                                    <a href="{{ route('posts.show', $post->slug) }}" class="text-green-600 dark:text-green-400 hover:text-green-900 dark:hover:text-green-300">Ver</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <div class="p-6 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-white">No hay publicaciones</h3>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Comienza creando tu primera publicación.</p>
                        <div class="mt-6">
                            <a href="{{ route('teacher.posts.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                <svg class="-ml-1 mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                </svg>
                                Nueva Publicación
                            </a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Notificaciones y Recordatorios -->
        <div class="mt-8 grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Próximas Actividades -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow">
                <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white">Próximas Actividades</h3>
                </div>
                <div class="p-6">
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 bg-blue-100 dark:bg-blue-800 rounded-full flex items-center justify-center">
                                    <svg class="w-4 h-4 text-blue-600 dark:text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-900 dark:text-white">Reunión de Profesores</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">Viernes 28 de Noviembre, 3:00 PM</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 bg-green-100 dark:bg-green-800 rounded-full flex items-center justify-center">
                                    <svg class="w-4 h-4 text-green-600 dark:text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-900 dark:text-white">Entrega de Calificaciones</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">Lunes 1 de Diciembre</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Comentarios Recientes -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow">
                <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white">Comentarios Recientes</h3>
                </div>
                <div class="p-6">
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <img class="h-8 w-8 rounded-full" src="https://ui-avatars.com/api/?name=Estudiante+Ejemplo&background=6366f1&color=fff" alt="Estudiante">
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-900 dark:text-white">Estudiante Ejemplo</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">en "Bienvenida al Año Escolar"</p>
                                <p class="text-sm text-gray-600 dark:text-gray-300 mt-1">¡Excelente información profesor!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal para Autorizar Estudiante - DENTRO DEL CONTENT -->
<div id="authorizationModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
    <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-1/2 lg:w-1/3 shadow-lg rounded-md bg-white dark:bg-gray-800">
        <div class="mt-3">
            <!-- Header -->
            <div class="flex items-center justify-between pb-3 border-b border-gray-200 dark:border-gray-700">
                <h3 class="text-lg font-medium text-gray-900 dark:text-white">Autorizar Nuevo Estudiante</h3>
                <button onclick="closeAuthorizationModal()" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Form -->
            <form class="space-y-4 mt-4" action="{{ route('allowed_students.store') }}" method="POST">
                @csrf
                
                <!-- Cédula del estudiante -->
                <div>
                    <label for="student_cedula" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Cédula del Estudiante
                    </label>
                    <div class="mt-1">
                        <input id="student_cedula" name="student_cedula" type="text" required 
                               class="appearance-none block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:text-white"
                               placeholder="Ingrese la cédula del estudiante">
                    </div>
                    <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">
                        Ingrese la cédula del estudiante para permitir su registro en la plataforma.
                    </p>
                </div>

                <!-- Opción para agregar padre/tutor -->
                <div class="border-t pt-4 mt-4">
                    <div class="mb-4">
                        <label class="flex items-center">
                            <input type="checkbox" id="add_parent" name="add_parent" value="1" 
                                   class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                            <span class="ml-2 text-sm text-gray-700 dark:text-gray-300">
                                También autorizar padre/madre o tutor para este estudiante
                            </span>
                        </label>
                    </div>

                    <!-- Campos del padre (ocultos inicialmente) -->
                    <div id="parent-fields" class="hidden space-y-4 bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
                        <div>
                            <label for="parent_cedula" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Cédula del Padre/Tutor
                            </label>
                            <div class="mt-1">
                                <input id="parent_cedula" name="parent_cedula" type="text" 
                                       class="appearance-none block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:text-white"
                                       placeholder="Ingrese la cédula del padre/tutor">
                            </div>
                        </div>

                        <div>
                            <label for="parent_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Nombre del Padre/Tutor
                            </label>
                            <div class="mt-1">
                                <input id="parent_name" name="parent_name" type="text" 
                                       class="appearance-none block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:text-white"
                                       placeholder="Ingrese el nombre completo">
                            </div>
                        </div>

                        <!-- Números de contacto (reemplazan el email) -->
                        <div>
                            <label for="parent_phone_1" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Número de Contacto 1
                            </label>
                            <div class="mt-1">
                                <input id="parent_phone_1" name="parent_phone_1" type="tel" 
                                       class="appearance-none block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:text-white"
                                       placeholder="Ej: 0412-1234567">
                            </div>
                        </div>

                        <div>
                            <label for="parent_phone_2" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Número de Contacto 2 (opcional)
                            </label>
                            <div class="mt-1">
                                <input id="parent_phone_2" name="parent_phone_2" type="tel" 
                                       class="appearance-none block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:text-white"
                                       placeholder="Ej: 0424-9876543">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Botones -->
                <div class="flex justify-end space-x-3 pt-4">
                    <button type="button" onclick="closeAuthorizationModal()" 
                            class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-600 border border-gray-300 dark:border-gray-500 rounded-md hover:bg-gray-50 dark:hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Cancelar
                    </button>
                    <button type="submit" 
                            class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Autorizar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

{{-- Scripts directamente en la vista para evitar problemas --}}
@section('scripts')
<script>
// Funciones para el modal
function openAuthorizationModal() {
    console.log('Abriendo modal...'); // Para debug
    document.getElementById('authorizationModal').classList.remove('hidden');
}

function closeAuthorizationModal() {
    console.log('Cerrando modal...'); // Para debug
    document.getElementById('authorizationModal').classList.add('hidden');
    // Resetear el formulario
    document.getElementById('add_parent').checked = false;
    document.getElementById('parent-fields').classList.add('hidden');
    // Limpiar campos requeridos
    document.getElementById('parent_cedula').required = false;
    document.getElementById('parent_name').required = false;
    document.getElementById('parent_phone_1').required = false;
    document.getElementById('parent_phone_2').required = false;
}

// Inicializar cuando el DOM esté listo
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM cargado - inicializando modal...'); // Para debug
    
    const addParentCheckbox = document.getElementById('add_parent');
    const parentFields = document.getElementById('parent-fields');
    const modal = document.getElementById('authorizationModal');

    if (addParentCheckbox && parentFields) {
        addParentCheckbox.addEventListener('change', function() {
            if (this.checked) {
                parentFields.classList.remove('hidden');
                // Hacer requeridos los campos del padre
                document.getElementById('parent_cedula').required = true;
                document.getElementById('parent_name').required = true;
                document.getElementById('parent_phone_1').required = true;
                // El segundo teléfono es opcional
                document.getElementById('parent_phone_2').required = false;
            } else {
                parentFields.classList.add('hidden');
                // Quitar requerido de los campos del padre
                document.getElementById('parent_cedula').required = false;
                document.getElementById('parent_name').required = false;
                document.getElementById('parent_phone_1').required = false;
                document.getElementById('parent_phone_2').required = false;
            }
        });
    }

    // Cerrar modal al hacer click fuera
    if (modal) {
        modal.addEventListener('click', function(e) {
            if (e.target.id === 'authorizationModal') {
                closeAuthorizationModal();
            }
        });
    }

    // Cerrar modal con ESC
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeAuthorizationModal();
        }
    });
});
</script>
@endsection