<aside class="w-64 bg-gray-800 text-white min-h-screen">
    <div class="p-4 font-bold text-xl border-b border-gray-700">
        Dashboard
    </div>

    <nav class="mt-4">
        <a href="{{ route('dashboard') }}" class="block px-4 py-2 hover:bg-gray-700">
            Accueil
        </a>

        <a href="{{ route('reports.index') }}" class="block px-4 py-2 hover:bg-gray-700">
            Reports
        </a>

        <a href="{{ route('students.index') }}" class="block px-4 py-2 hover:bg-gray-700">
            Étudiants
        </a>
    </nav>
</aside>
