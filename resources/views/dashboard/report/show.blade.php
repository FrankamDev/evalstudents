<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            Bulletin de {{ $student->first_name }} {{ $student->last_name }}
        </h2>
    </x-slot>

    <div class="py-10 px-4 sm:px-6 lg:px-8 bg-gray-900 min-h-screen">
        <div class="max-w-4xl mx-auto">
            @if ($reports->isEmpty())
                <div class="bg-yellow-900 border-l-4 border-yellow-500 text-yellow-200 p-6 rounded-lg text-center">
                    Aucun bulletin disponible pour cet étudiant (aucune évaluation enregistrée).
                </div>
            @else
                @foreach ($reports as $report)
                    <div class="bg-gray-800 rounded-2xl shadow-2xl overflow-hidden mb-10">
                        <!-- En-tête -->
                        <div class="bg-indigo-900 p-8 text-center">
                            <h1 class="text-4xl font-bold text-white mb-2">BULLETIN DE NOTES</h1>
                            <p class="text-indigo-200 text-xl">
                                {{ $report->academicYear->libelle }} – Semestre {{ $report->semester }}
                            </p>
                        </div>

                        <!-- Infos étudiant -->
                        <div class="p-8 border-b border-gray-700">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <h3 class="text-lg font-semibold text-indigo-300">Étudiant</h3>
                                    <p class="text-2xl font-bold text-white mt-1">
                                        {{ $student->first_name }} {{ $student->last_name }}
                                    </p>
                                    <p class="text-gray-400 mt-1">Matricule : {{ $student->matricule }}</p>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-indigo-300">Spécialité</h3>
                                    <p class="text-xl text-white mt-1">
                                        {{ $student->specialty->name ?? 'Non définie' }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Résultats -->
                        <div class="p-8">
                            <div class="bg-gray-900 rounded-xl p-6 text-center shadow-inner">
                                <p class="text-6xl font-bold text-white mb-2">
                                    {{ number_format($report->average, 2) }}
                                    <span class="text-3xl">/20</span>
                                </p>
                                <p
                                    class="text-3xl font-semibold mt-2 {{ $report->decision == 'Admis' ? 'text-green-400' : 'text-red-400' }}">
                                    {{ $report->decision }}
                                </p>
                                <p class="text-2xl text-gray-300 mt-2">
                                    Mention : <span class="font-bold">{{ $report->mention }}</span>
                                </p>
                            </div>

                            @if ($report->remark)
                                <div class="mt-8">
                                    <h3 class="text-xl font-semibold text-indigo-300 mb-3">Observations</h3>
                                    <p class="text-gray-300 bg-gray-700 p-4 rounded-lg">
                                        {{ $report->remark }}
                                    </p>
                                </div>
                            @endif
                        </div>

                        <!-- Boutons d'export -->
                        <div class="p-8 border-t border-gray-700 flex flex-col sm:flex-row gap-4 justify-center">
                            <a href="{{ route('reports.pdf', $report) }}"
                                class="inline-flex items-center px-8 py-4 bg-indigo-600 hover:bg-indigo-700 text-white text-xl font-bold rounded-lg shadow-lg transition transform hover:scale-105">
                                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                    </path>
                                </svg>
                                Télécharger PDF
                            </a>

                            <a href="{{ route('reports.excel', $report) }}"
                                class="inline-flex items-center px-8 py-4 bg-green-600 hover:bg-green-700 text-white text-xl font-bold rounded-lg shadow-lg transition transform hover:scale-105">
                                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 17v-2m3 2v-4m3 4v-6m-9 10h12a2 2 0 002-2V5a2 2 0 00-2-2H9a2 2 0 00-2 2v14a2 2 0 002 2z">
                                    </path>
                                </svg>
                                Télécharger Excel
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif

            <div class="text-center mt-8">
                <a href="{{ route('reports.index') }}" class="text-indigo-400 hover:text-indigo-300 font-medium">
                    ← Retour à la liste des étudiants
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
