<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Générer un Nouveau Bulletin
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-2xl font-bold mb-6">Nouveau Bulletin</h3>

                    @if ($errors->any())
                        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-r-lg">
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('reports.store') }}" class="space-y-6">
                        @csrf

                        <div>
                            <label for="student_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Étudiant
                            </label>
                            <select name="student_id" id="student_id" required
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                <option value="">Sélectionner un étudiant</option>
                                @foreach ($students as $student)
                                    <option value="{{ $student->id }}"
                                        {{ old('student_id') == $student->id ? 'selected' : '' }}>
                                        {{ $student->first_name }} {{ $student->last_name }} ({{ $student->matricule }})
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="academic_year_id"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Année académique
                            </label>
                            <select name="academic_year_id" id="academic_year_id" required
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                <option value="">Sélectionner une année</option>
                                @foreach ($academicYears as $year)
                                    <option value="{{ $year->id }}"
                                        {{ old('academic_year_id') == $year->id ? 'selected' : '' }}>
                                        {{ $year->libelle }} {{ $year->is_active ? '(Active)' : '' }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="semester"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Semestre
                                </label>
                                <select name="semester" id="semester" required
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                    <option value="">Choisir</option>
                                    <option value="1" {{ old('semester') == 1 ? 'selected' : '' }}>Semestre 1
                                    </option>
                                    <option value="2" {{ old('semester') == 2 ? 'selected' : '' }}>Semestre 2
                                    </option>
                                </select>
                            </div>

                            <div>
                                <label for="average"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Moyenne (/20) – laissez vide pour calcul automatique
                                </label>
                                <input type="number" name="average" id="average" step="0.01" min="0"
                                    max="20" value="{{ old('average') }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            </div>
                        </div>

                        <div>
                            <label for="remark" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Remarques / Observations
                            </label>
                            <textarea name="remark" id="remark" rows="4"
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ old('remark') }}</textarea>
                        </div>

                        <div class="flex justify-end space-x-4">
                            <a href="{{ route('reports.index') }}"
                                class="px-4 py-2 bg-gray-300 dark:bg-gray-600 hover:bg-gray-400 dark:hover:bg-gray-500 text-gray-800 dark:text-gray-200 rounded-md transition">
                                Annuler
                            </a>
                            <button type="submit"
                                class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-md transition">
                                Générer le bulletin
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
