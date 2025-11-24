@extends('layouts.blog')

@section('title', 'Admin Dashboard')

@section('content')
<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
            <h3 class="text-sm font-medium text-gray-500">Usuarios</h3>
            <div class="mt-2 text-3xl font-bold">{{ $usersCount }}</div>
        </div>
        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
            <h3 class="text-sm font-medium text-gray-500">Posts</h3>
            <div class="mt-2 text-3xl font-bold">{{ $postsCount }}</div>
        </div>
        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
            <h3 class="text-sm font-medium text-gray-500">Categorías</h3>
            <div class="mt-2 text-3xl font-bold">{{ $categoriesCount }}</div>
        </div>
    </div>

    <div class="mt-6 grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
            <h3 class="text-lg font-medium">Usuarios recientes</h3>
            <ul class="mt-4 space-y-2">
                @foreach($recentUsers as $u)
                    <li class="flex items-center space-x-3">
                        <img src="{{ $u->avatar ? asset('storage/'.$u->avatar) : 'https://ui-avatars.com/api/?name='.urlencode($u->name).'&background=6366f1&color=fff' }}" class="h-8 w-8 rounded-full" alt="">
                        <div class="text-sm">{{ $u->name }} <div class="text-xs text-gray-500">{{ $u->email }}</div></div>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
            <h3 class="text-lg font-medium">Posts recientes</h3>
            <ul class="mt-4 space-y-2">
                @foreach($recentPosts as $p)
                    <li>
                        <a href="{{ route('posts.show', $p->slug) }}" class="text-sm text-indigo-600 hover:underline">{{ $p->title }}</a>
                        <div class="text-xs text-gray-500">{{ $p->created_at->format('Y-m-d') }}</div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="mt-6">
        <a href="{{ route('admin.settings') }}" class="px-4 py-2 bg-indigo-600 text-white rounded">Abrir Settings (Generar tokens)</a>
    </div>
</div>
@endsection
