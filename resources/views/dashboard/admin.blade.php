{{-- resources/views/admin/dashboard.blade.php --}}
@extends('layouts.blog')

@section('title', 'Admin Dashboard')

@section('content')
<div class="min-h-screen bg-gray-50 dark:bg-gray-900 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Panel de Administración</h1>
            <p class="mt-2 text-gray-600 dark:text-gray-400">Resumen general del sistema</p>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Total Users -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-8 h-8 bg-indigo-500 rounded-full flex items-center justify-center">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Usuarios</p>
                        <p class="text-2xl font-semibold text-gray-900 dark:text-white">{{ $userStats['total_users'] }}</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">{{ $userStats['new_users_this_month'] }} nuevos este mes</p>
                    </div>
                </div>
            </div>

            <!-- Teachers -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Profesores</p>
                        <p class="text-2xl font-semibold text-gray-900 dark:text-white">{{ $userStats['total_teachers'] }}</p>
                    </div>
                </div>
            </div>

            <!-- Students -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Estudiantes</p>
                        <p class="text-2xl font-semibold text-gray-900 dark:text-white">{{ $userStats['total_students'] }}</p>
                    </div>
                </div>
            </div>

            <!-- Published Posts -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-8 h-8 bg-yellow-500 rounded-full flex items-center justify-center">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Posts Publicados</p>
                        <p class="text-2xl font-semibold text-gray-900 dark:text-white">{{ $contentStats['published_posts'] }}</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">{{ $contentStats['draft_posts'] }} borradores</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
            <!-- Posts Chart -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Actividad de Posts - {{ date('Y') }}</h3>
                <div class="h-64">
                    <canvas id="postsChart"></canvas>
                </div>
            </div>

            <!-- Users Chart -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Distribución de Usuarios</h3>
                <div class="h-64">
                    <canvas id="usersChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Recent Posts -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow">
                <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Posts Recientes</h3>
                </div>
                <div class="p-6">
                    <div class="space-y-4">
                        @foreach($recentData['recent_posts'] as $post)
                        <div class="flex items-start justify-between">
                            <div class="flex-1">
                                <h4 class="text-sm font-medium text-gray-900 dark:text-white">
                                    <a href="{{ route('posts.show', $post->slug) }}" class="hover:text-indigo-600 dark:hover:text-indigo-400">
                                        {{ Str::limit($post->title, 40) }}
                                    </a>
                                </h4>
                                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                    Por {{ $post->user->name }} • {{ $post->created_at->format('d/m/Y') }}
                                </p>
                            </div>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                {{ $post->status == 'published' ? 'bg-green-100 text-green-800 dark:bg-green-800 dark:text-green-100' : 
                                   ($post->status == 'draft' ? 'bg-yellow-100 text-yellow-800 dark:bg-yellow-800 dark:text-yellow-100' : 
                                   'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300') }}">
                                {{ $post->status }}
                            </span>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Recent Users -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow">
                <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Usuarios Recientes</h3>
                </div>
                <div class="p-6">
                    <div class="space-y-4">
                        @foreach($recentData['recent_users'] as $user)
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                @php 
                                    $avatar = $user->avatar ? asset('storage/' . $user->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) . '&background=6366f1&color=fff';
                                @endphp
                                <img class="h-8 w-8 rounded-full" src="{{ $avatar }}" alt="{{ $user->name }}">
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-900 dark:text-white">{{ $user->name }}</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">{{ $user->email }}</p>
                                </div>
                            </div>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                {{ $user->role == 'admin' ? 'bg-red-100 text-red-800 dark:bg-red-800 dark:text-red-100' : 
                                   ($user->role == 'teacher' ? 'bg-green-100 text-green-800 dark:bg-green-800 dark:text-green-100' : 
                                   ($user->role == 'student' ? 'bg-blue-100 text-blue-800 dark:bg-blue-800 dark:text-blue-100' : 
                                   'bg-yellow-100 text-yellow-800 dark:bg-yellow-800 dark:text-yellow-100')) }}">
                                {{ $user->role }}
                            </span>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Gráfico de Posts por Mes
    const postsCtx = document.getElementById('postsChart').getContext('2d');
    const postsChart = new Chart(postsCtx, {
        type: 'line',
        data: {
            labels: {!! json_encode($charts['posts_by_month']['labels']) !!},
            datasets: [{
                label: 'Posts Creados',
                data: {!! json_encode($charts['posts_by_month']['data']) !!},
                borderColor: '#6366f1',
                backgroundColor: 'rgba(99, 102, 241, 0.1)',
                borderWidth: 2,
                tension: 0.4,
                fill: true,
                pointBackgroundColor: '#6366f1',
                pointBorderColor: '#ffffff',
                pointBorderWidth: 2,
                pointRadius: 4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        precision: 0
                    },
                    grid: {
                        color: 'rgba(0, 0, 0, 0.1)'
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });

    // Gráfico de Usuarios por Rol
    const usersCtx = document.getElementById('usersChart').getContext('2d');
    const usersChart = new Chart(usersCtx, {
        type: 'doughnut',
        data: {
            labels: {!! json_encode($charts['users_by_role']['labels']) !!},
            datasets: [{
                data: {!! json_encode($charts['users_by_role']['data']) !!},
                backgroundColor: {!! json_encode($charts['users_by_role']['colors']) !!},
                borderWidth: 2,
                borderColor: '#1f2937'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        color: '#6b7280',
                        font: {
                            size: 11
                        }
                    }
                }
            },
            cutout: '60%'
        }
    });
</script>
@endpush