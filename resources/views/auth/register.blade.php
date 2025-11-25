@extends('layouts.blog')

@section('title', 'Registro')

@section('content')
<div class="min-h-full flex flex-col justify-center py-12 sm:px-6 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900 dark:text-white">
            Crea una cuenta nueva
        </h2>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-white dark:bg-gray-800 py-8 px-4 shadow sm:rounded-lg sm:px-10">
            <form class="space-y-6" action="{{ route('register.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Nombre
                    </label>
                    <div class="mt-1">
                        <input id="name" name="name" type="text" autocomplete="name" required value="{{ old('name') }}" class="appearance-none block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:text-white">
                    </div>
                    @error('name')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Correo electrónico
                    </label>
                    <div class="mt-1">
                        <input id="email" name="email" type="email" autocomplete="email" required value="{{ old('email') }}" class="appearance-none block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:text-white">
                    </div>
                    @error('email')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="role" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Soy...
                    </label>
                    <div class="mt-1">
                        @php $isAdmin = auth()->check() && auth()->user()->role === 'admin'; @endphp
                        @auth
                            @if($isAdmin)
                                <select id="role" name="role" required class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 dark:border-gray-600 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md dark:bg-gray-700 dark:text-white">
                                    <option value="student" {{ old('role')=='student' ? 'selected' : '' }}>Estudiante</option>
                                    <option value="parent" {{ old('role')=='parent' ? 'selected' : '' }}>Padre/Madre</option>
                                    <option value="teacher" {{ old('role')=='teacher' ? 'selected' : '' }}>Profesor</option>
                                    <option value="admin" {{ old('role')=='admin' ? 'selected' : '' }}>Administrador</option>
                                </select>
                            @else
                                <select id="role" name="role" required class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 dark:border-gray-600 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md dark:bg-gray-700 dark:text-white">
                                    <option value="student" {{ old('role')=='student' ? 'selected' : '' }}>Estudiante</option>
                                    <option value="parent" {{ old('role')=='parent' ? 'selected' : '' }}>Padre/Madre</option>
                                    <option value="teacher" {{ old('role')=='teacher' ? 'selected' : '' }}>Profesor (requiere código)</option>
                                    <option value="admin" {{ old('role')=='admin' ? 'selected' : '' }}>Administrador (requiere código)</option>
                                </select>
                            @endif
                        @else
                            <select id="role" name="role" required class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 dark:border-gray-600 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md dark:bg-gray-700 dark:text-white">
                                <option value="student" {{ old('role')=='student' ? 'selected' : '' }}>Estudiante</option>
                                <option value="parent" {{ old('role')=='parent' ? 'selected' : '' }}>Padre/Madre</option>
                                <option value="teacher" {{ old('role')=='teacher' ? 'selected' : '' }}>Profesor (requiere código)</option>
                                <option value="admin" {{ old('role')=='admin' ? 'selected' : '' }}>Administrador (requiere código)</option>
                            </select>
                        @endauth
                    </div>
                    @error('role')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div id="token-group" class="{{ in_array(old('role'), ['teacher','admin']) ? '' : 'hidden' }}">
                    <label for="registration_token" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Código de registro (para Profesor/Administrador)</label>
                    <div class="mt-1">
                        <input id="registration_token" name="registration_token" type="text" value="{{ old('registration_token') }}" class="appearance-none block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:text-white">
                    </div>
                    @error('registration_token')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">Si seleccionas Profesor o Administrador, introduce el código que te proporcionó el centro.</p>
                </div>

                <div id="cedula-group" class="{{ old('role') == 'student' || old('role') == '' ? '' : 'hidden' }}">
                    <label for="cedula" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Cédula de Identidad</label>
                    <div class="mt-1">
                        <input id="cedula" name="cedula" type="text" value="{{ old('cedula') }}" class="appearance-none block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:text-white">
                    </div>
                    @error('cedula')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">Requerido para estudiantes. Debe haber sido autorizada previamente por un administrador o profesor.</p>
                </div>

                <div>
                    <label for="avatar" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Avatar (opcional)</label>
                    <div class="mt-1">
                        <input id="avatar" name="avatar" type="file" accept="image/*" class="appearance-none block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:bg-indigo-600 file:text-white" />
                    </div>
                    @error('avatar')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Contraseña
                    </label>
                    <div class="mt-1">
                        <input id="password" name="password" type="password" autocomplete="new-password" required class="appearance-none block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:text-white">
                    </div>
                    @error('password')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Confirmar contraseña
                    </label>
                    <div class="mt-1">
                        <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" required class="appearance-none block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:text-white">
                    </div>
                </div>

                <div>
                    <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Registrarme
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const roleSelect = document.getElementById('role');
        const tokenGroup = document.getElementById('token-group');
        const cedulaGroup = document.getElementById('cedula-group');

        function toggleFields() {
            if (!roleSelect) return;
            const v = roleSelect.value;
            
            // Token logic
            if (v === 'teacher' || v === 'admin') {
                tokenGroup.classList.remove('hidden');
            } else {
                tokenGroup.classList.add('hidden');
                const input = tokenGroup.querySelector('input[name="registration_token"]');
                if (input) input.value = '';
            }

            // Cedula logic
            if (v === 'student') {
                cedulaGroup.classList.remove('hidden');
            } else {
                cedulaGroup.classList.add('hidden');
                const input = cedulaGroup.querySelector('input[name="cedula"]');
                if (input) input.value = '';
            }
        }

        if (roleSelect) {
            roleSelect.addEventListener('change', toggleFields);
            toggleFields();
        }
    });
</script>
@endsection
