<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            Bulletins des Étudiants
        </h2>
    </x-slot>

    <div class="py-10 px-4 sm:px-6 lg:px-8 bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto">
            <h1 class="text-3xl font-bold text-white mb-8">Liste des Étudiants</h1>

            <div class="bg-gray-800 rounded-xl shadow-2xl overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-700">
                        <thead class="bg-gray-900">
                            <tr>
                                <th
                                    class="px-6 py-4 text-left text-sm font-semibold text-indigo-300 uppercase tracking-wider">
                                    Matricule</th>
                                <th
                                    class="px-6 py-4 text-left text-sm font-semibold text-indigo-300 uppercase tracking-wider">
                                    Nom complet</th>
                                <th
                                    class="px-6 py-4 text-left text-sm font-semibold text-indigo-300 uppercase tracking-wider">
                                    Spécialité</th>
                                <th
                                    class="px-6 py-4 text-left text-sm font-semibold text-indigo-300 uppercase tracking-wider">
                                    Année</th>
                                <th
                                    class="px-6 py-4 text-right text-sm font-semibold text-indigo-300 uppercase tracking-wider">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-700">
                            @forelse ($students as $student)
                                <tr class="hover:bg-gray-700 transition-colors">
                                    <td class="px-6 py-4 whitespace-nowrap font-medium text-white">
                                        {{ $student->matricule }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-300">
                                        {{ $student->first_name }} {{ $student->last_name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-300">
                                        {{ $student->specialty->name ?? '—' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-300">
                                        {{ $student->academicYear->libelle ?? '—' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right">
                                        <a href="{{ route('reports.show', $student) }}"
                                            class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg transition">
                                            Voir le Bulletin
                                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5l7 7-7 7" />
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-10 text-center text-gray-400">
                                        Aucun étudiant enregistré pour le moment.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
