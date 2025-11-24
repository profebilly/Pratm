@extends('layouts.dashboard')

@section('title', 'Crear Post')
@section('header', 'Crear nuevo post')

@section('content')
    <div class="max-w-3xl mx-auto">
        @if(session('status'))
            <div class="mb-4 text-green-600">{{ session('status') }}</div>
        @endif

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
            <form action="{{ route('teacher.posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Título</label>
                    <input type="text" name="title" value="{{ old('title') }}" required class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                    @error('title')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Contenido</label>
                    <textarea name="body" rows="8" required class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white">{{ old('body') }}</textarea>
                    @error('body')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Imagen (opcional)</label>
                    <input type="file" name="image" class="mt-1 block w-full text-sm text-gray-700 dark:text-gray-300">
                    @error('image')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Estado</label>
                    <select name="status" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                        <option value="draft">Borrador</option>
                        <option value="published">Publicado</option>
                    </select>
                    @error('status')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
                </div>

                <div>
                    <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded">Crear</button>
                </div>
            </form>
        </div>
    </div>
@endsection
