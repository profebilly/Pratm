{{-- resources/views/dashboard/parent.blade.php --}}
@extends('layouts.blog')

@section('title', 'Dashboard - Padre')

@section('content')
<div class="min-h-screen bg-gray-50 dark:bg-gray-900 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Panel de Padres</h1>
            <p class="mt-2 text-gray-600 dark:text-gray-400">Bienvenido, {{ auth()->user()->name }}</p>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            <!-- Hijos Registrados -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Hijos Registrados</p>
                        <p class="text-2xl font-semibold text-gray-900 dark:text-white">2</p>
                    </div>
                </div>
            </div>

            <!-- Notificaciones Pendientes -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-8 h-8 bg-yellow-500 rounded-full flex items-center justify-center">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                            </svg>
                        </div>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Notificaciones</p>
                        <p class="text-2xl font-semibold text-gray-900 dark:text-white">3</p>
                    </div>
                </div>
            </div>

            <!-- Mensajes Sin Leer -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Mensajes</p>
                        <p class="text-2xl font-semibold text-gray-900 dark:text-white">5</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            
            <!-- Hijos Registrados -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow">
                <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Mis Hijos</h3>
                </div>
                <div class="p-6">
                    <div class="space-y-4">
                        <!-- Ejemplo de hijo 1 -->
                        <div class="flex items-center justify-between p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                            <div class="flex items-center">
                                <img class="h-10 w-10 rounded-full" src="https://ui-avatars.com/api/?name=Juan+Perez&background=6366f1&color=fff" alt="Juan Perez">
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-900 dark:text-white">Juan Perez</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">Grado: 5° Primaria</p>
                                </div>
                            </div>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-800 dark:text-green-100">
                                Activo
                            </span>
                        </div>

                        <!-- Ejemplo de hijo 2 -->
                        <div class="flex items-center justify-between p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                            <div class="flex items-center">
                                <img class="h-10 w-10 rounded-full" src="https://ui-avatars.com/api/?name=Maria+Perez&background=ec4899&color=fff" alt="Maria Perez">
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-900 dark:text-white">Maria Perez</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">Grado: 3° Primaria</p>
                                </div>
                            </div>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-800 dark:text-green-100">
                                Activo
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Notificaciones Recientes -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow">
                <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Notificaciones Recientes</h3>
                </div>
                <div class="p-6">
                    <div class="space-y-4">
                        <!-- Notificación 1 -->
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 bg-blue-100 dark:bg-blue-800 rounded-full flex items-center justify-center">
                                    <svg class="w-4 h-4 text-blue-600 dark:text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-3 flex-1">
                                <p class="text-sm font-medium text-gray-900 dark:text-white">Reunión de padres</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">Viernes 15 de Noviembre, 4:00 PM</p>
                                <p class="text-xs text-gray-600 dark:text-gray-300 mt-1">No olvide la reunión mensual de padres...</p>
                            </div>
                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-800 dark:text-blue-100">
                                Nuevo
                            </span>
                        </div>

                        <!-- Notificación 2 -->
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 bg-green-100 dark:bg-green-800 rounded-full flex items-center justify-center">
                                    <svg class="w-4 h-4 text-green-600 dark:text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-3 flex-1">
                                <p class="text-sm font-medium text-gray-900 dark:text-white">Tarea completada</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">Juan completó su tarea de matemáticas</p>
                                <p class="text-xs text-gray-600 dark:text-gray-300 mt-1">Calificación: 9.5/10</p>
                            </div>
                        </div>

                        <!-- Notificación 3 -->
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 bg-yellow-100 dark:bg-yellow-800 rounded-full flex items-center justify-center">
                                    <svg class="w-4 h-4 text-yellow-600 dark:text-yellow-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-3 flex-1">
                                <p class="text-sm font-medium text-gray-900 dark:text-white">Recordatorio de pago</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">Mensualidad pendiente</p>
                                <p class="text-xs text-gray-600 dark:text-gray-300 mt-1">Vence el 30 de Noviembre</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Calendario de Eventos -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow lg:col-span-2">
                <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Próximos Eventos</h3>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <!-- Evento 1 -->
                        <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-4">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 w-12 h-12 bg-red-100 dark:bg-red-800 rounded-lg flex flex-col items-center justify-center">
                                    <span class="text-sm font-bold text-red-600 dark:text-red-300">15</span>
                                    <span class="text-xs text-red-500 dark:text-red-400">NOV</span>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-900 dark:text-white">Reunión de Padres</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">4:00 PM - Auditorio</p>
                                </div>
                            </div>
                        </div>

                        <!-- Evento 2 -->
                        <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-4">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 w-12 h-12 bg-blue-100 dark:bg-blue-800 rounded-lg flex flex-col items-center justify-center">
                                    <span class="text-sm font-bold text-blue-600 dark:text-blue-300">20</span>
                                    <span class="text-xs text-blue-500 dark:text-blue-400">NOV</span>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-900 dark:text-white">Feria de Ciencias</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">Todo el día</p>
                                </div>
                            </div>
                        </div>

                        <!-- Evento 3 -->
                        <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-4">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 w-12 h-12 bg-green-100 dark:bg-green-800 rounded-lg flex flex-col items-center justify-center">
                                    <span class="text-sm font-bold text-green-600 dark:text-green-300">25</span>
                                    <span class="text-xs text-green-500 dark:text-green-400">NOV</span>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-900 dark:text-white">Entrega de Calificaciones</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">8:00 AM - 2:00 PM</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="mt-8 bg-white dark:bg-gray-800 rounded-lg shadow">
            <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Acciones Rápidas</h3>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <a href="#" class="flex flex-col items-center p-4 bg-gray-50 dark:bg-gray-700 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 transition-colors">
                        <svg class="w-6 h-6 text-gray-600 dark:text-gray-300 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Ver Calificaciones</span>
                    </a>

                    <a href="#" class="flex flex-col items-center p-4 bg-gray-50 dark:bg-gray-700 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 transition-colors">
                        <svg class="w-6 h-6 text-gray-600 dark:text-gray-300 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                        </svg>
                        <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Contactar Profesor</span>
                    </a>

                    <a href="#" class="flex flex-col items-center p-4 bg-gray-50 dark:bg-gray-700 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 transition-colors">
                        <svg class="w-6 h-6 text-gray-600 dark:text-gray-300 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                        <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Documentos</span>
                    </a>

                    <a href="#" class="flex flex-col items-center p-4 bg-gray-50 dark:bg-gray-700 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 transition-colors">
                        <svg class="w-6 h-6 text-gray-600 dark:text-gray-300 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                        </svg>
                        <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Pagos</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection