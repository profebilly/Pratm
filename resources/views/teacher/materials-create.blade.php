@extends('layouts.blog')

@section('title', 'Crear Material de Clase')

@section('content')
<div class="min-h-screen bg-gray-50 dark:bg-gray-900 py-8">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header -->
        <div class="mb-8">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Crear Material de Clase</h1>
                    <p class="mt-2 text-gray-600 dark:text-gray-400">Comparte recursos educativos con tus estudiantes</p>
                </div>
                <a href="{{ route('teacher.materials') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm text-sm font-medium text-gray-700 dark:text-gray-200 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    ← Volver a Materiales
                </a>
            </div>
        </div>

        <!-- Form -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow">
            <form action="{{ route('teacher.materials.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="p-6 space-y-6">
                    <!-- Title -->
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Título del Material *
                        </label>
                        <input type="text" name="title" id="title" required
                               class="mt-1 block w-full border border-gray-300 dark:border-gray-600 dark:bg-gray-700 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                               placeholder="Ej: Guía de Matemáticas - Álgebra Básica">
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Descripción
                        </label>
                        <textarea name="description" id="description" rows="3"
                                  class="mt-1 block w-full border border-gray-300 dark:border-gray-600 dark:bg-gray-700 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                  placeholder="Describe el contenido y objetivo de este material..."></textarea>
                    </div>

                    <!-- Type Selection -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">
                            Tipo de Material *
                        </label>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            <label class="relative flex cursor-pointer">
                                <input type="radio" name="type" value="document" class="sr-only" checked>
                                <div class="material-type-card border-2 border-gray-300 dark:border-gray-600 rounded-lg p-4 text-center hover:border-indigo-500 transition-colors peer-checked:border-indigo-500 peer-checked:bg-indigo-50 dark:peer-checked:bg-indigo-900">
                                    <div class="text-2xl mb-2">📄</div>
                                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Documento</span>
                                </div>
                            </label>

                            <label class="relative flex cursor-pointer">
                                <input type="radio" name="type" value="video" class="sr-only">
                                <div class="material-type-card border-2 border-gray-300 dark:border-gray-600 rounded-lg p-4 text-center hover:border-indigo-500 transition-colors peer-checked:border-indigo-500 peer-checked:bg-indigo-50 dark:peer-checked:bg-indigo-900">
                                    <div class="text-2xl mb-2">🎬</div>
                                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Video</span>
                                </div>
                            </label>

                            <label class="relative flex cursor-pointer">
                                <input type="radio" name="type" value="presentation" class="sr-only">
                                <div class="material-type-card border-2 border-gray-300 dark:border-gray-600 rounded-lg p-4 text-center hover:border-indigo-500 transition-colors peer-checked:border-indigo-500 peer-checked:bg-indigo-50 dark:peer-checked:bg-indigo-900">
                                    <div class="text-2xl mb-2">📽️</div>
                                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Presentación</span>
                                </div>
                            </label>

                            <label class="relative flex cursor-pointer">
                                <input type="radio" name="type" value="link" class="sr-only">
                                <div class="material-type-card border-2 border-gray-300 dark:border-gray-600 rounded-lg p-4 text-center hover:border-indigo-500 transition-colors peer-checked:border-indigo-500 peer-checked:bg-indigo-50 dark:peer-checked:bg-indigo-900">
                                    <div class="text-2xl mb-2">🔗</div>
                                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Enlace</span>
                                </div>
                            </label>
                        </div>
                    </div>

                    <!-- File Upload (hidden when link is selected) -->
                    <div id="file-upload-section">
                        <label for="file" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Subir Archivo
                        </label>
                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 dark:border-gray-600 border-dashed rounded-md">
                            <div class="space-y-1 text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex text-sm text-gray-600 dark:text-gray-400">
                                    <label for="file" class="relative cursor-pointer bg-white dark:bg-gray-800 rounded-md font-medium text-indigo-600 dark:text-indigo-400 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                        <span>Sube un archivo</span>
                                        <input id="file" name="file" type="file" class="sr-only">
                                    </label>
                                    <p class="pl-1">o arrastra y suelta</p>
                                </div>
                                <p class="text-xs text-gray-500 dark:text-gray-400">
                                    PDF, DOC, PPT, MP4 hasta 10MB
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- External URL (hidden by default) -->
                    <div id="external-url-section" class="hidden">
                        <label for="external_url" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            URL del Recurso
                        </label>
                        <input type="url" name="external_url" id="external_url"
                               class="mt-1 block w-full border border-gray-300 dark:border-gray-600 dark:bg-gray-700 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                               placeholder="https://ejemplo.com/recurso">
                    </div>

                    <!-- Subject and Grade Level -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="subject" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Materia/Asignatura
                            </label>
                            <input type="text" name="subject" id="subject"
                                   class="mt-1 block w-full border border-gray-300 dark:border-gray-600 dark:bg-gray-700 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                   placeholder="Ej: Matemáticas, Ciencias...">
                        </div>

                        <div>
                            <label for="grade_level" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Nivel Educativo
                            </label>
                            <input type="text" name="grade_level" id="grade_level"
                                   class="mt-1 block w-full border border-gray-300 dark:border-gray-600 dark:bg-gray-700 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                   placeholder="Ej: Primaria, Secundaria...">
                        </div>
                    </div>

                    <!-- Categories -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Categorías
                        </label>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-2">
                            @foreach($categories as $category)
                            <label class="inline-flex items-center">
                                <input type="checkbox" name="categories[]" value="{{ $category->id }}" 
                                       class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <span class="ml-2 text-sm text-gray-700 dark:text-gray-300">{{ $category->name }}</span>
                            </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Publish Option -->
                    <div class="flex items-center">
                        <input type="checkbox" name="is_published" id="is_published" 
                               class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <label for="is_published" class="ml-2 block text-sm text-gray-700 dark:text-gray-300">
                            Publicar inmediatamente
                        </label>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="px-6 py-4 bg-gray-50 dark:bg-gray-700 border-t border-gray-200 dark:border-gray-600 flex justify-end space-x-3">
                    <a href="{{ route('teacher.materials') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm text-sm font-medium text-gray-700 dark:text-gray-200 bg-white dark:bg-gray-600 hover:bg-gray-50 dark:hover:bg-gray-500">
                        Cancelar
                    </a>
                    <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <svg class="-ml-1 mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Crear Material
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const typeRadios = document.querySelectorAll('input[name="type"]');
    const fileSection = document.getElementById('file-upload-section');
    const urlSection = document.getElementById('external-url-section');
    const fileInput = document.getElementById('file');
    const urlInput = document.getElementById('external_url');

    function toggleSections() {
        const selectedType = document.querySelector('input[name="type"]:checked').value;
        
        if (selectedType === 'link') {
            fileSection.classList.add('hidden');
            urlSection.classList.remove('hidden');
            fileInput.removeAttribute('required');
            urlInput.setAttribute('required', 'required');
        } else {
            fileSection.classList.remove('hidden');
            urlSection.classList.add('hidden');
            fileInput.setAttribute('required', 'required');
            urlInput.removeAttribute('required');
        }
    }

    typeRadios.forEach(radio => {
        radio.addEventListener('change', toggleSections);
    });

    // Initialize on page load
    toggleSections();
});
</script>

<style>
.material-type-card {
    transition: all 0.2s ease-in-out;
}

input:checked + .material-type-card {
    border-color: #6366f1;
    background-color: rgba(99, 102, 241, 0.1);
}

@media (prefers-color-scheme: dark) {
    input:checked + .material-type-card {
        background-color: rgba(79, 70, 229, 0.2);
    }
}
</style>
@endpush
@endsection