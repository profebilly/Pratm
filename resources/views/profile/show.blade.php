@extends('layouts.blog')

@section('title', 'Mi perfil')

@section('content')
<div class="max-w-3xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
    <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
        <div class="flex items-center space-x-6">
            <img class="h-24 w-24 rounded-full" src="{{ $user->avatar ? asset('storage/'.$user->avatar) : 'https://ui-avatars.com/api/?name='.urlencode($user->name).'&color=fff&background=6D28D9' }}" alt="{{ $user->name }}">
            <div>
                <h2 class="text-2xl font-semibold text-gray-900 dark:text-white">{{ $user->name }}</h2>
                <p class="text-sm text-gray-500 dark:text-gray-400">{{ $user->email }}</p>
                <p class="mt-2 text-sm text-gray-600 dark:text-gray-300">Rol: {{ ucfirst($user->role) }}</p>
            </div>
        </div>

        <div class="mt-6">
            <h3 class="text-lg font-medium text-gray-900 dark:text-white">Sobre mí</h3>
            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Aquí puedes agregar más detalles del perfil del usuario en el futuro.</p>
        </div>
    </div>
</div>
@endsection
