<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            Tableau de bord
        </h2>
    </x-slot>

    <div class="py-10 px-4 sm:px-6 lg:px-8 bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto">
            <!-- Titre d'accueil avec animation -->
            <div class="mb-10 animate-fade-in">
                <h1 class="text-3xl md:text-4xl font-bold text-white mb-2">
                    Bienvenue sur votre Espace Administration
                </h1>
                <p class="text-gray-400 text-lg">
                    Voici un aperçu global de votre système de gestion académique
                </p>
            </div>

            <!-- Cartes statistiques principales -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
                <!-- Carte Années académiques -->
                <div
                    class="bg-gradient-to-br from-indigo-900 to-indigo-800 rounded-xl shadow-lg overflow-hidden transform hover:scale-105 transition-all duration-300 animate-fade-in-up">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-indigo-300 text-sm font-medium uppercase tracking-wider">Années
                                    académiques</p>
                                <p class="text-4xl font-bold text-white mt-2">{{ $academicYearsCount }}</p>
                            </div>
                            <div class="bg-indigo-700/30 p-3 rounded-full">
                                <svg class="w-8 h-8 text-indigo-300" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <div class="mt-4">
                            <span class="text-green-400 text-sm font-medium">
                                {{ $activeAcademicYear ? 'Active : ' . $activeAcademicYear->libelle : 'Aucune active' }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Carte Spécialités -->
                <div
                    class="bg-gradient-to-br from-purple-900 to-purple-800 rounded-xl shadow-lg overflow-hidden transform hover:scale-105 transition-all duration-300 animate-fade-in-up delay-100">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-purple-300 text-sm font-medium uppercase tracking-wider">Spécialités</p>
                                <p class="text-4xl font-bold text-white mt-2">{{ $specialtiesCount }}</p>
                            </div>
                            <div class="bg-purple-700/30 p-3 rounded-full">
                                <svg class="w-8 h-8 text-purple-300" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <div class="mt-4 text-gray-300 text-sm">
                            {{ $specialtiesCount }} filières disponibles
                        </div>
                    </div>
                </div>

                <!-- Carte Modules -->
                <div
                    class="bg-gradient-to-br from-blue-900 to-blue-800 rounded-xl shadow-lg overflow-hidden transform hover:scale-105 transition-all duration-300 animate-fade-in-up delay-200">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-blue-300 text-sm font-medium uppercase tracking-wider">Modules</p>
                                <p class="text-4xl font-bold text-white mt-2">{{ $modulesCount }}</p>
                            </div>
                            <div class="bg-blue-700/30 p-3 rounded-full">
                                <svg class="w-8 h-8 text-blue-300" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <div class="mt-4 text-gray-300 text-sm">
                            {{ $modulesCount }} cours enregistrés
                        </div>
                    </div>
                </div>

                <!-- Carte Étudiants -->
                <div
                    class="bg-gradient-to-br from-green-900 to-green-800 rounded-xl shadow-lg overflow-hidden transform hover:scale-105 transition-all duration-300 animate-fade-in-up delay-300">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-green-300 text-sm font-medium uppercase tracking-wider">Étudiants</p>
                                <p class="text-4xl font-bold text-white mt-2">{{ $studentsCount }}</p>
                            </div>
                            <div class="bg-green-700/30 p-3 rounded-full">
                                <svg class="w-8 h-8 text-green-300" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <div class="mt-4 text-gray-300 text-sm">
                            Inscrits dans le système
                        </div>
                    </div>
                </div>
            </div>

            <!-- Deuxième ligne de cartes (optionnel - à développer plus tard) -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Carte Derniers modules ajoutés -->
                <div class="bg-gray-800 rounded-xl shadow-lg p-6 animate-fade-in-up delay-400">
                    <h3 class="text-xl font-bold text-white mb-4 flex items-center">
                        <svg class="w-6 h-6 mr-2 text-blue-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                        Derniers modules ajoutés
                    </h3>
                    <ul class="space-y-3 text-gray-300">
                        @forelse ($latestModules as $module)
                            <li class="flex justify-between items-center py-2 border-b border-gray-700 last:border-0">
                                <div>
                                    <span class="font-medium text-white">{{ $module->name }}</span>
                                    <span class="text-sm text-gray-500 ml-2">({{ $module->code }})</span>
                                </div>
                                <span class="text-sm text-gray-400">
                                    {{ $module->specialty->name ?? '—' }}
                                </span>
                            </li>
                        @empty
                            <li class="text-gray-500">Aucun module récent</li>
                        @endforelse
                    </ul>
                </div>

                <!-- Carte Année académique active -->
                <div class="bg-gray-800 rounded-xl shadow-lg p-6 animate-fade-in-up delay-500">
                    <h3 class="text-xl font-bold text-white mb-4 flex items-center">
                        <svg class="w-6 h-6 mr-2 text-green-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                        Année académique active
                    </h3>
                    @if ($activeAcademicYear)
                        <div class="bg-green-900/40 p-4 rounded-lg">
                            <p class="text-2xl font-bold text-white">{{ $activeAcademicYear->libelle }}</p>
                            <p class="text-gray-300 mt-2">
                                Du {{ $activeAcademicYear->date_debut->format('d/m/Y') }}
                                au {{ $activeAcademicYear->date_fin->format('d/m/Y') }}
                            </p>
                        </div>
                    @else
                        <div class="bg-yellow-900/40 p-4 rounded-lg text-yellow-300">
                            Aucune année académique n'est actuellement active.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Animations Tailwind + custom -->
    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fadeIn 0.8s ease-out forwards;
        }

        .animate-fade-in-up {
            animation: fadeIn 0.8s ease-out forwards;
        }

        .delay-100 {
            animation-delay: 0.1s;
        }

        .delay-200 {
            animation-delay: 0.2s;
        }

        .delay-300 {
            animation-delay: 0.3s;
        }

        .delay-400 {
            animation-delay: 0.4s;
        }

        .delay-500 {
            animation-delay: 0.5s;
        }
    </style>
</x-app-layout>
