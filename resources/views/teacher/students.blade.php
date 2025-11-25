@extends('layouts.blog')

@section('title', 'Gestión de Estudiantes')

@section('content')
<div class="min-h-screen bg-gray-50 dark:bg-gray-900 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header -->
        <div class="mb-8">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Gestión de Estudiantes</h1>
                    <p class="mt-2 text-gray-600 dark:text-gray-400">Lista completa de estudiantes registrados</p>
                </div>
                <div class="flex gap-4">
                    <!-- Botón para abrir el modal de autorización -->
                    <button onclick="openAuthorizationModal()" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <svg class="-ml-1 mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Autorizar Nuevo Estudiante
                    </button>
                    <a href="{{ route('teacher.dashboard') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm text-sm font-medium text-gray-700 dark:text-gray-200 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        ← Volver al Dashboard
                    </a>
                </div>
            </div>
        </div>

        <!-- Stats -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-blue-100 text-blue-500 dark:bg-blue-900 dark:text-blue-300 mr-4">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Estudiantes</p>
                        <p class="text-2xl font-semibold text-gray-900 dark:text-white">{{ $stats['total_students'] }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-green-100 text-green-500 dark:bg-green-900 dark:text-green-300 mr-4">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Estudiantes Activos</p>
                        <p class="text-2xl font-semibold text-gray-900 dark:text-white">{{ $stats['active_students'] }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-purple-100 text-purple-500 dark:bg-purple-900 dark:text-purple-300 mr-4">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Con Publicaciones</p>
                        <p class="text-2xl font-semibold text-gray-900 dark:text-white">{{ $stats['students_with_posts'] }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-orange-100 text-orange-500 dark:bg-orange-900 dark:text-orange-300 mr-4">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Con Comentarios</p>
                        <p class="text-2xl font-semibold text-gray-900 dark:text-white">{{ $stats['students_with_comments'] }}</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Mensajes de éxito/error -->
        @if(session('success'))
            <div class="bg-green-50 dark:bg-green-900 border border-green-200 dark:border-green-700 rounded-md p-4 mb-6">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-green-800 dark:text-green-200">
                            {{ session('success') }}
                        </p>
                    </div>
                </div>
            </div>
        @endif

        @if($errors->any())
            <div class="bg-red-50 dark:bg-red-900 border border-red-200 dark:border-red-700 rounded-md p-4 mb-6">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-red-800 dark:text-red-200">
                            @foreach($errors->all() as $error)
                                {{ $error }}<br>
                            @endforeach
                        </p>
                    </div>
                </div>
            </div>
        @endif

        <!-- Students Table -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow">
            <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                <h3 class="text-lg font-medium text-gray-900 dark:text-white">Lista de Estudiantes</h3>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Estudiante
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Publicaciones
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Comentarios
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Estado
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Acciones</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                        @forelse($students as $student)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    @php 
                                        $avatar = $student->avatar ? asset('storage/' . $student->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode($student->name) . '&background=6366f1&color=fff';
                                    @endphp
                                    <img class="h-10 w-10 rounded-full" src="{{ $avatar }}" alt="{{ $student->name }}">
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900 dark:text-white">
                                            {{ $student->name }}
                                        </div>
                                        <div class="text-xs text-gray-500 dark:text-gray-400">
                                            Registro: {{ $student->created_at->format('d/m/Y') }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900 dark:text-white">{{ $student->email }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                                    {{ $student->posts_count }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                    {{ $student->comments_count }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                            @if($student->posts_count > 0 || $student->comments_count > 0)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                    Activo
                                </span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300">
                                    Inactivo
                                </span>
                            @endif
                        </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="#" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-900 dark:hover:text-indigo-300 mr-3">
                                    Ver Perfil
                                </a>
                                <a href="#" class="text-green-600 dark:text-green-400 hover:text-green-900 dark:hover:text-green-300">
                                    Contactar
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-6 py-4 text-center text-sm text-gray-500 dark:text-gray-400">
                                <div class="flex flex-col items-center justify-center py-8">
                                    <svg class="w-12 h-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                    </svg>
                                    <p class="text-lg font-medium text-gray-900 dark:text-white mb-2">No hay estudiantes registrados</p>
                                    <p class="text-gray-500 dark:text-gray-400">Los estudiantes aparecerán aquí una vez se registren en el sistema.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination -->
            @if($students->hasPages())
            <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700">
                {{ $students->links() }}
            </div>
            @endif
        </div>

        <!-- Quick Actions -->
        <div class="mt-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <a href="#" class="flex flex-col items-center p-4 bg-white dark:bg-gray-800 rounded-lg shadow hover:shadow-md transition-shadow">
                <svg class="w-8 h-8 text-indigo-600 dark:text-indigo-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Perfil Completo</span>
            </a>

            <a href="#" class="flex flex-col items-center p-4 bg-white dark:bg-gray-800 rounded-lg shadow hover:shadow-md transition-shadow">
                <svg class="w-8 h-8 text-green-600 dark:text-green-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Enviar Email</span>
            </a>

            <a href="#" class="flex flex-col items-center p-4 bg-white dark:bg-gray-800 rounded-lg shadow hover:shadow-md transition-shadow">
                <svg class="w-8 h-8 text-blue-600 dark:text-blue-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Reportes</span>
            </a>

            <a href="#" class="flex flex-col items-center p-4 bg-white dark:bg-gray-800 rounded-lg shadow hover:shadow-md transition-shadow">
                <svg class="w-8 h-8 text-purple-600 dark:text-purple-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                </svg>
                <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Estadísticas</span>
            </a>
        </div>
    </div>
</div>

<!-- Modal para Autorizar Estudiante -->
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

                        <!-- Números de contacto -->
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

@section('scripts')
<script>
// Funciones para el modal
function openAuthorizationModal() {
    console.log('Abriendo modal...');
    document.getElementById('authorizationModal').classList.remove('hidden');
}

function closeAuthorizationModal() {
    console.log('Cerrando modal...');
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
    console.log('DOM cargado - inicializando modal...');
    
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