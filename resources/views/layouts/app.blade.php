<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Sidebar -->
        <aside
            class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0"
            aria-label="Sidebar">
            <div class="h-full px-3 pb-4 overflow-y-auto bg-white">
                <ul class="space-y-2 font-medium">
                    <li>
                        <a href="/dashboard"
                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                            <svg class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 22 21">
                                <path
                                    d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                                <path
                                    d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                            </svg>
                            <span class="ml-3">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="/dashboard/annee"
                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                            <svg class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path
                                    d="M0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm14-7.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm-5-4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm-5-4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1ZM20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4Z" />
                            </svg>
                            <span class="ml-3">Années</span>
                        </a>
                    </li>
                    <li>
                        <a href="/dashboard/specialite"
                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                            <svg class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.96 2.96 0 0 0 .13 5H5Z" />
                                <path
                                    d="M6.737 11.061a2.961 2.961 0 0 1 .81-1.515l6.117-6.116A4.839 4.839 0 0 1 16 2.141V2a3.97 3.97 0 0 0-1.293-.749L8.59 7.367 2.474 1.252A3.97 3.97 0 0 0 2 2.141V2c0 .628.234 1.2.651 1.606l6.116 6.116a2.97 2.97 0 0 1-1.03 3.338L3.707 20.29a3.97 3.97 0 0 0 .879 1.121l2.74-2.74a2.74 2.74 0 0 1 3.862 0l.153.153a2.74 2.74 0 0 1 0 3.862l-2.74 2.74a3.97 3.97 0 0 0 1.121.879h.001l1.515-.81a2.961 2.961 0 0 1 3.338-1.03l6.116 6.116c.406.417.978.651 1.606.651h.001a3.97 3.97 0 0 0 1.121-.879l-2.74-2.74a2.74 2.74 0 0 1 0-3.862l.153-.153a2.74 2.74 0 0 1 3.862 0l2.74 2.74a3.97 3.97 0 0 0 .879-1.121L11.061 13.263a2.961 2.961 0 0 1-1.515.81L6.737 11.061Z" />
                            </svg>
                            <span class="ml-3">Spécialités</span>
                        </a>
                    </li>
                    <li>
                        <a href="/dashboard/modules"
                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                            <svg class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 16 20">
                                <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.98 2.98 0 0 0 .13 5H5Z" />
                                <path
                                    d="M14.066 0H7v5a2 2 0 0 1-2 2H0v11a1.97 1.97 0 0 0 1.934 2h12.132A1.97 1.97 0 0 0 16 18V2a1.97 1.97 0 0 0-1.934-2ZM9 13a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-2a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v2Zm4 .382a1 1 0 0 1-1.447.894L10 13v-1l1.553 1.276a1 1 0 0 1-.106 1.517Z" />
                            </svg>
                            <span class="ml-3">Modules</span>
                        </a>
                    </li>
                    <li>
                        <a href="/dashboard/teachers"
                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                            <svg class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 20 19">
                                <path
                                    d="M7.324 9.917A2.479 2.479 0 0 1 7.99 7.7l.71-.71a2.468 2.468 0 0 1 2.287-.75 2.32 2.32 0 0 1 .5-.044V3a3.011 3.011 0 0 0-3-3H3a3.011 3.011 0 0 0-3 3v4a1 1 0 0 0 1 1h6.324l.044-.001ZM19 11a3.011 3.011 0 0 0-3-3h-5.487a3.55 3.55 0 0 0 .487 1.927l.71.71a2.479 2.479 0 0 1 .666 2.19V16a3.011 3.011 0 0 0 3 3h5a3.011 3.011 0 0 0 3-3v-4a1 1 0 0 0-1-1h-3.513Z" />
                                <path
                                    d="M19 0a3.011 3.011 0 0 0-3 3v4a1 1 0 0 0 1 1h6.324l.044-.001A2.479 2.479 0 0 1 19.99 7.7l.71-.71a2.468 2.468 0 0 1 2.287-.75 2.32 2.32 0 0 1 .5-.044V3a3.011 3.011 0 0 0-3-3h-5Zm-14 14a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h4a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1H5Zm8-6a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h4a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1h-4Zm-2 8a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h.01a1 1 0 0 0 1-1v-1a1 1 0 0 0-1-1H11Zm-4 0a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h.01a1 1 0 0 0 1-1v-1a1 1 0 0 0-1-1H7Z" />
                            </svg>
                            <span class="ml-3">Teachers</span>
                        </a>
                    </li>
                    <li>
                        <a href="/dashboard/students"
                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                            <svg class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 20 19">
                                <path
                                    d="M14.5 0A3.987 3.987 0 0 0 11 3.825a.2.2 0 0 1-.344-.11V.737A.25.25 0 0 0 10.375 0H9.625a.25.25 0 0 0-.25.25v2.978a.2.2 0 0 1-.344.11A3.987 3.987 0 0 0 5.5 0 3.987 3.987 0 0 0 2 3.825a.2.2 0 0 1-.344-.11V.737A.25.25 0 0 0 1.375 0H.625a.25.25 0 0 0-.25.25v2.978a.2.2 0 0 1-.344.11A3.987 3.987 0 0 0-2 3.825V19a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V3.825A3.987 3.987 0 0 0 14.5 0Zm-8 19H4v-3a1 1 0 0 0-1-1H1v-3a1 1 0 0 0-1-1h14a1 1 0 0 0 1 1v3h-2a1 1 0 0 0-1 1v3H6.5Z" />
                            </svg>
                            <span class="ml-3">Students</span>
                        </a>
                    </li>
                    <li>
                        <a href="/dashboard/evaluations"
                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                            <svg class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path
                                    d="M15 1h-10v2h2v2H5v2h2v2H5v2h2v2H5v2h2v2H5v2h10v-2h-2v-2h2v-2h-2v-2h2v-2h-2V9h2V7h-2V5h2V3h-2V1Zm-5 4v10H10V5h0Z" />
                            </svg>
                            <span class="ml-3">Evaluations</span>
                        </a>
                    </li>
                    <li>
                        <a href="/dashboard/reports"
                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                            <svg class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 16 20">
                                <path
                                    d="M14 0H2a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-1 18H3V2h10v16Zm-3-3H6a1 1 0 0 1 0-2h4a1 1 0 0 1 0 2Zm0-4H6a1 1 0 0 1 0-2h4a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="ml-3">Reports</span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>

        <!-- Page Content -->
        <main class="p-4 sm:ml-64">
            <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg">
                {{ $slot }}
            </div>
        </main>
    </div>
</body>

</html>
