<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Gestion des specialites
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold mb-4">Specialites</h1>
                    <p class="mb-4">Ici, vous pouvez ajouter, éditer ou supprimer des années (ex. : 2023-2024).</p>

                    <!-- Exemple de tableau stylé -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Année</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <!-- Placeholder : Ajoute des données réelles via controller -->
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">2023-2024</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="#" class="text-blue-600 hover:text-blue-900">Éditer</a>
                                        <a href="#" class="ml-4 text-red-600 hover:text-red-900">Supprimer</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Bouton ajouter -->
                    <button class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Ajouter une Année
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
