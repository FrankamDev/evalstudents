<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Modifier l'Étudiant
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-2xl font-bold mb-6">Modifier : {{ $student->first_name }} {{ $student->last_name }}
                    </h3>

                    @if ($errors->any())
                        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-r-lg">
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('students.update', $student) }}" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="matricule"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Matricule
                                </label>
                                <input type="text" name="matricule" id="matricule"
                                    value="{{ old('matricule', $student->matricule) }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm uppercase"
                                    required maxlength="50">
                            </div>

                            <div>
                                <label for="email"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Email (optionnel)
                                </label>
                                <input type="email" name="email" id="email"
                                    value="{{ old('email', $student->email) }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    placeholder="exemple@universite.cm">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="first_name"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Prénom
                                </label>
                                <input type="text" name="first_name" id="first_name"
                                    value="{{ old('first_name', $student->first_name) }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    required>
                            </div>

                            <div>
                                <label for="last_name"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Nom de famille
                                </label>
                                <input type="text" name="last_name" id="last_name"
                                    value="{{ old('last_name', $student->last_name) }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    required>
                            </div>
                        </div>

                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Téléphone (optionnel)
                            </label>
                            <input type="tel" name="phone" id="phone"
                                value="{{ old('phone', $student->phone) }}"
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                placeholder="+237 6XX XXX XXX">
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="specialty_id"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Spécialité
                                </label>
                                <select name="specialty_id" id="specialty_id"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                    <option value="">Aucune spécialité</option>
                                    @foreach ($specialties as $specialty)
                                        <option value="{{ $specialty->id }}"
                                            {{ old('specialty_id', $student->specialty_id) == $specialty->id ? 'selected' : '' }}>
                                            {{ $specialty->name }} ({{ $specialty->code }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="academic_year_id"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Année académique
                                </label>
                                <select name="academic_year_id" id="academic_year_id"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                    <option value="">Aucune année</option>
                                    @foreach ($academicYears as $year)
                                        <option value="{{ $year->id }}"
                                            {{ old('academic_year_id', $student->academic_year_id) == $year->id ? 'selected' : '' }}>
                                            {{ $year->libelle }} {{ $year->is_active ? '(Active)' : '' }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="flex justify-end space-x-4">
                            <a href="{{ route('students.index') }}"
                                class="px-4 py-2 bg-gray-300 dark:bg-gray-600 hover:bg-gray-400 dark:hover:bg-gray-500 text-gray-800 dark:text-gray-200 rounded-md transition">
                                Annuler
                            </a>
                            <button type="submit"
                                class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-md transition">
                                Enregistrer les modifications
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
