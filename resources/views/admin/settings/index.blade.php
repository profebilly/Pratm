@extends('layouts.dashboard')

@section('title', 'Ajustes')

@section('content')
<div class="max-w-4xl mx-auto py-8 px-4">
    <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
        <h2 class="text-xl font-semibold mb-4">Tokens de registro</h2>
        @if(session('status'))
            <div class="mb-4 text-sm text-green-600">{{ session('status') }}</div>
        @endif

        @if(session('generated_teacher'))
            <div class="mb-4 p-4 bg-yellow-50 dark:bg-yellow-900 rounded text-sm">
                Token de profesor generado (muestra una sola vez): <code class="font-mono">{{ session('generated_teacher') }}</code>
            </div>
        @endif
        @if(session('generated_admin'))
            <div class="mb-4 p-4 bg-yellow-50 dark:bg-yellow-900 rounded text-sm">
                Token de administrador generado (muestra una sola vez): <code class="font-mono">{{ session('generated_admin') }}</code>
            </div>
        @endif

        <form action="{{ route('admin.settings.update') }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Token para Profesores</label>
                <div class="flex mt-1">
                    <input type="text" name="teacher_registration_token" value="{{ old('teacher_registration_token', $teacher) }}" class="flex-1 rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white mr-2">
                    <button type="submit" name="action" value="generate_teacher" class="px-4 py-2 bg-indigo-600 text-white rounded">Generar</button>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Token para Administradores</label>
                <div class="flex mt-1">
                    <input type="text" name="admin_registration_token" value="{{ old('admin_registration_token', $admin) }}" class="flex-1 rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white mr-2">
                    <button type="submit" name="action" value="generate_admin" class="px-4 py-2 bg-indigo-600 text-white rounded">Generar</button>
                </div>
            </div>

            <div>
                <button class="px-4 py-2 bg-indigo-600 text-white rounded">Guardar</button>
            </div>
        </form>

        <div class="mt-6">
            <h3 class="text-lg font-medium">Cambios recientes</h3>
            <div class="mt-2 text-sm text-gray-600 dark:text-gray-300">
                @foreach(\App\Models\SettingChange::latest()->take(8)->get() as $change)
                    <div class="py-2 border-b border-gray-100 dark:border-gray-700">
                        <div class="text-xs text-gray-500">{{ $change->created_at->format('Y-m-d H:i') }} por {{ optional($change->user)->name ?? 'Sistema' }}</div>
                        <div class="font-mono text-sm">{{ $change->key }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script>
    // Copy token to clipboard when clicked
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('code').forEach(function (el) {
            el.style.cursor = 'pointer';
            el.title = 'Click para copiar';
            el.addEventListener('click', function () {
                navigator.clipboard.writeText(el.textContent).then(function () {
                    alert('Token copiado al portapapeles.');
                });
            });
        });
    });
</script>
@endsection
