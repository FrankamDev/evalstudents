<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Créer un Nouveau Module
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-2xl font-bold mb-6">Nouveau Module</h3>

                    @if ($errors->any())
                        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-r-lg">
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('modules.store') }}" class="space-y-6">
                        @csrf

                        <div>
                            <label for="specialty_id"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Spécialité
                            </label>
                            <select name="specialty_id" id="specialty_id" required
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                <option value="">Sélectionner une spécialité</option>
                                @foreach ($specialties as $specialty)
                                    <option value="{{ $specialty->id }}"
                                        {{ old('specialty_id') == $specialty->id ? 'selected' : '' }}>
                                        {{ $specialty->name }} ({{ $specialty->code }})
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="code" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Code du module (ex: INF101)
                            </label>
                            <input type="text" name="code" id="code" value="{{ old('code') }}"
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm uppercase"
                                required maxlength="20">
                        </div>

                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Nom du module
                            </label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}"
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                required>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="coefficient"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Coefficient
                                </label>
                                <input type="number" name="coefficient" id="coefficient"
                                    value="{{ old('coefficient', 1) }}" min="1" max="20" required
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            </div>

                            <div>
                                <label for="sequence"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Séquence / Ordre
                                </label>
                                <input type="number" name="sequence" id="sequence" value="{{ old('sequence', 1) }}"
                                    min="1" max="99" required
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            </div>
                        </div>

                        <div class="flex justify-end space-x-4">
                            <a href="{{ route('modules.index') }}"
                                class="px-4 py-2 bg-gray-300 dark:bg-gray-600 hover:bg-gray-400 dark:hover:bg-gray-500 text-gray-800 dark:text-gray-200 rounded-md transition">
                                Annuler
                            </a>
                            <button type="submit"
                                class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-md transition">
                                Créer le module
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
