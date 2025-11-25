@extends('layouts.blog')

@section('title', 'Sobre Nosotros - Centro Educativo')

@section('content')
<div class="min-h-screen bg-gray-50 dark:bg-gray-900 py-12">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header -->
        <div class="text-center mb-16">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-4">
                Sobre Nuestro <span class="text-blue-600 dark:text-blue-400">Centro Educativo</span>
            </h1>
            <p class="text-xl text-gray-600 dark:text-gray-300 max-w-3xl mx-auto">
                Conoce la historia, misión y valores que nos definen como institución educativa líder en tecnología.
            </p>
        </div>

        <!-- Fundadora Section -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8 mb-16">
            <div class="flex flex-col md:flex-row items-center gap-8">
                <!-- Foto de la fundadora -->
                <div class="flex-shrink-0">
                    <img 
                        src="https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=400&q=80" 
                        alt="Fundadora del Centro Educativo"
                        class="w-48 h-48 rounded-2xl object-cover shadow-lg"
                    >
                </div>
                
                <!-- Biografía -->
                <div class="flex-1">
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">
                        Nuestra Fundadora
                    </h2>
                    <div class="prose prose-lg dark:prose-invert max-w-none">
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed mb-4">
                            <strong class="text-blue-600 dark:text-blue-400">María González</strong>, fundadora y directora de nuestro centro educativo, es una apasionada de la educación tecnológica con más de 15 años de experiencia en la industria del software.
                        </p>
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed mb-4">
                            Con una Maestría en Ciencias de la Computación y certificaciones en pedagogía, María ha dedicado su carrera a cerrar la brecha entre la academia y la industria, formando a la próxima generación de desarrolladores y profesionales tech.
                        </p>
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                            "Creo firmemente que la educación tecnológica de calidad puede transformar vidas y comunidades. Nuestro centro nació con la visión de hacer la programación accesible para todos."
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content Grid: Misión/Visión/Valores + Mapa -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-16">
            
            <!-- Columna Izquierda: Misión, Visión, Valores -->
            <div class="space-y-8">
                <!-- Misión -->
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8">
                    <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Nuestra Misión</h3>
                    <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                        Formar profesionales en tecnología con excelencia académica, valores éticos y capacidad innovadora para contribuir al desarrollo tecnológico de nuestra sociedad. Brindamos educación práctica y actualizada que prepare a nuestros estudiantes para los desafíos del mercado laboral.
                    </p>
                </div>

                <!-- Visión -->
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8">
                    <div class="w-12 h-12 bg-green-100 dark:bg-green-900 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Nuestra Visión</h3>
                    <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                        Ser el centro educativo líder en formación tecnológica, reconocido por la calidad de nuestros egresados y nuestro impacto positivo en la industria del software. Aspiramos a expandirnos a nivel nacional manteniendo nuestro compromiso con la excelencia educativa.
                    </p>
                </div>

                <!-- Valores -->
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8">
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Nuestros Valores</h3>
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <div class="flex-shrink-0 w-8 h-8 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center mt-1">
                                <svg class="w-4 h-4 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Calidad</h4>
                                <p class="text-gray-600 dark:text-gray-300">Excelencia académica en todos nuestros programas educativos y metodologías de enseñanza.</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="flex-shrink-0 w-8 h-8 bg-green-100 dark:bg-green-900 rounded-full flex items-center justify-center mt-1">
                                <svg class="w-4 h-4 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Comunidad</h4>
                                <p class="text-gray-600 dark:text-gray-300">Fomentamos el trabajo en equipo, colaboración y apoyo mutuo entre estudiantes y docentes.</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="flex-shrink-0 w-8 h-8 bg-purple-100 dark:bg-purple-900 rounded-full flex items-center justify-center mt-1">
                                <svg class="w-4 h-4 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Innovación</h4>
                                <p class="text-gray-600 dark:text-gray-300">Siempre a la vanguardia de las tecnologías emergentes y metodologías educativas modernas.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Columna Derecha: Mapa -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8">
                <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Nuestra Ubicación</h3>
                <div class="aspect-w-16 aspect-h-9 bg-gray-200 dark:bg-gray-700 rounded-xl overflow-hidden mb-6">
                    <!-- Mapa placeholder - puedes reemplazar con Google Maps embed -->
                    <div class="w-full h-80 bg-gradient-to-br from-blue-400 to-purple-600 rounded-xl flex items-center justify-center">
                        <div class="text-center text-white">
                            <svg class="w-16 h-16 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <p class="text-lg font-semibold">Mapa Interactivo</p>
                            <p class="text-sm opacity-90">Aquí iría el embed de Google Maps</p>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <p class="text-gray-600 dark:text-gray-300 text-sm">
                        Haz clic en el mapa para ver nuestra ubicación exacta en Google Maps
                    </p>
                </div>
            </div>
        </div>

        <!-- Información de Contacto -->
        <div class="bg-gradient-to-r from-blue-600 to-purple-700 rounded-2xl shadow-lg p-8 text-white">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold mb-4">Visítanos en Nuestro Centro</h2>
                <p class="text-blue-100 text-xl">Estamos aquí para ayudarte en tu camino educativo</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">
                <!-- Dirección -->
                <div class="text-center">
                    <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Dirección</h3>
                    <p class="text-blue-100 leading-relaxed">
                        Av. Principal #123<br>
                        Sector El Recreo<br>
                        Caracas 1050<br>
                        Distrito Capital, Venezuela
                    </p>
                </div>

                <!-- Teléfono -->
                <div class="text-center">
                    <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Teléfonos</h3>
                    <div class="text-blue-100 leading-relaxed space-y-1">
                        <p>📞 +58 (212) 555-1234</p>
                        <p>📱 +58 (412) 555-5678</p>
                        <p>📠 +58 (212) 555-9012</p>
                    </div>
                </div>
            </div>

            <!-- Horario -->
            <div class="text-center mt-8 pt-8 border-t border-white/20">
                <h3 class="text-xl font-bold mb-4">Horario de Atención</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 max-w-2xl mx-auto text-blue-100">
                    <div>
                        <p class="font-semibold">Lunes a Viernes</p>
                        <p>7:00 AM - 7:00 PM</p>
                    </div>
                    <div>
                        <p class="font-semibold">Sábados</p>
                        <p>8:00 AM - 2:00 PM</p>
                    </div>
                    <div>
                        <p class="font-semibold">Domingos</p>
                        <p>Cerrado</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection