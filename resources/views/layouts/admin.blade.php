<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Administration') - ABREMA</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        [x-cloak] {
            display: none !important;
        }

        .abrema-green {
            background-color: #2d7a3e;
        }

        .abrema-red {
            background-color: #8b1a1a;
        }
    </style>

    @stack('styles')
</head>

<body class="bg-gray-50" x-data="{ sidebarOpen: false }">

    <!-- Sidebar -->
    <aside
        class="fixed inset-y-0 left-0 z-50 flex flex-col w-64 h-full overflow-hidden transition-transform duration-300 ease-in-out transform bg-white shadow-lg lg:translate-x-0"
        :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">
        <!-- Logo -->
        <div class="flex items-center justify-center h-20 px-4 border-b abrema-green">
            <img src="/images/logo-abrema.png" alt="ABREMA" class="h-12" onerror="this.style.display='none'">
            <span class="ml-2 text-xl font-bold text-white">ABREMA</span>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 py-4 overflow-y-auto">
            <div class="px-4 space-y-1">
                <!-- Dashboard -->
                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-green-50 hover:text-green-700 transition {{ request()->routeIs('admin.dashboard') ? 'bg-green-50 text-green-700' : '' }}">
                    <i class="w-5 fas fa-chart-line"></i>
                    <span class="ml-3 font-medium">Dashboard</span>
                </a>

                <!-- Produits -->
                <a href="{{ route('admin.produits.index') }}"
                    class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-green-50 hover:text-green-700 transition {{ request()->routeIs('admin.produits.*') ? 'bg-green-50 text-green-700' : '' }}">
                    <i class="w-5 fas fa-pills"></i>
                    <span class="ml-3 font-medium">Produits</span>
                </a>

                <!-- Actualités -->
                <a href="{{ route('admin.actualites.index') }}"
                    class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-green-50 hover:text-green-700 transition {{ request()->routeIs('admin.actualites.*') ? 'bg-green-50 text-green-700' : '' }}">
                    <i class="w-5 fas fa-newspaper"></i>
                    <span class="ml-3 font-medium">Actualités</span>
                </a>

                <!-- Publications -->
                <a href="{{ route('admin.publications.index') }}"
                    class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-green-50 hover:text-green-700 transition {{ request()->routeIs('admin.publications.*') ? 'bg-green-50 text-green-700' : '' }}">
                    <i class="w-5 fas fa-book"></i>
                    <span class="ml-3 font-medium">Publications</span>
                </a>

                <!-- Équipe Direction -->
                <a href="{{ route('admin.equipe-directions.index') }}"
                    class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-green-50 hover:text-green-700 transition {{ request()->routeIs('admin.equipe.*') ? 'bg-green-50 text-green-700' : '' }}">
                    <i class="w-5 fas fa-users"></i>
                    <span class="ml-3 font-medium">Équipe Direction</span>
                </a>

                <!-- Partenaires -->
                <a href="{{ route('admin.partenaires.index') }}"
                    class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-green-50 hover:text-green-700 transition {{ request()->routeIs('admin.partenaires.*') ? 'bg-green-50 text-green-700' : '' }}">
                    <i class="w-5 fas fa-handshake"></i>
                    <span class="ml-3 font-medium">Partenaires</span>
                </a>

                <!-- Clients -->
                <a href="{{ route('admin.clients.index') }}"
                    class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-green-50 hover:text-green-700 transition {{ request()->routeIs('admin.clients.*') ? 'bg-green-50 text-green-700' : '' }}">
                    <i class="w-5 fas fa-building"></i>
                    <span class="ml-3 font-medium">Clients</span>
                </a>

                <!-- Textes Reglementaires (with submenus) -->
                <div x-data="{ openTextes: {{ request()->routeIs('admin.texte-*') ? 'true' : 'false' }} }" class="space-y-1">
                    <button @click="openTextes = !openTextes" type="button"
                        class="flex items-center w-full px-4 py-3 text-gray-700 transition rounded-lg hover:bg-green-50 hover:text-green-700"
                        :class="openTextes ? 'bg-green-50 text-green-700' : ''">
                        <i class="w-5 fas fa-file-contract"></i>
                        <span class="flex-1 ml-3 font-medium text-left">Textes Réglementaires</span>
                        <i :class="openTextes ? 'fas fa-chevron-up' : 'fas fa-chevron-down'"></i>
                    </button>

                    <div x-show="openTextes" x-cloak class="mt-1 space-y-1">
                        <a href="{{ route('admin.texte-medicaments.index') }}"
                            class="flex items-center px-8 py-2 text-gray-700 rounded-lg hover:bg-green-50 hover:text-green-700 transition {{ request()->routeIs('admin.texte-medicaments.*') ? 'bg-green-50 text-green-700' : '' }}">
                            <span class="ml-3 text-sm">Médicaments</span>
                        </a>
                        <a href="{{ route('admin.texte-import-export.index') }}"
                            class="flex items-center px-8 py-2 text-gray-700 rounded-lg hover:bg-green-50 hover:text-green-700 transition {{ request()->routeIs('admin.texte-import-export.*') ? 'bg-green-50 text-green-700' : '' }}">
                            <span class="ml-3 text-sm">Import & Export</span>
                        </a>
                        <a href="{{ route('admin.texte-vigilance.index') }}"
                            class="flex items-center px-8 py-2 text-gray-700 rounded-lg hover:bg-green-50 hover:text-green-700 transition {{ request()->routeIs('admin.texte-vigilance.*') ? 'bg-green-50 text-green-700' : '' }}">
                            <span class="ml-3 text-sm">Vigilance</span>
                        </a>
                    </div>
                </div>

                <!-- Autres Documents -->
                <a href="{{ route('admin.autres-documents.index') }}"
                    class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-green-50 hover:text-green-700 transition {{ request()->routeIs('admin.autres-documents.*') ? 'bg-green-50 text-green-700' : '' }}">
                    <i class="w-5 fas fa-file-alt"></i>
                    <span class="ml-3 font-medium">Autres Documents</span>
                </a>


                <!-- Colis -->
                <a href="{{ route('admin.colis.index') }}"
                    class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-green-50 hover:text-green-700 transition {{ request()->routeIs('admin.colis.*') ? 'bg-green-50 text-green-700' : '' }}">
                    <i class="w-5 fas fa-box"></i>
                    <span class="ml-3 font-medium">Colis Soumis</span>
                    @if (isset($colisCount) && $colisCount > 0)
                        <span
                            class="px-2 py-1 ml-auto text-xs text-white bg-red-500 rounded-full">{{ $colisCount }}</span>
                    @endif
                </a>
            </div>
        </nav>

        <!-- User Section -->
        <div class="p-4 border-t">
            <div class="flex items-center">
                <div class="flex items-center justify-center w-10 h-10 font-bold text-white bg-green-600 rounded-full">
                    {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                </div>
                <div class="flex-1 ml-3">
                    <p class="text-sm font-medium text-gray-700">{{ auth()->user()->name ?? 'Admin' }}</p>
                    <p class="text-xs text-gray-500">Administrateur</p>
                </div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-gray-400 hover:text-red-600">
                        <i class="fas fa-sign-out-alt"></i>
                    </button>
                </form>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="lg:pl-64">
        <!-- Top Bar -->
        <header class="sticky top-0 z-40 bg-white shadow-sm">
            <div class="flex items-center justify-between h-16 px-4">
                <!-- Mobile Menu Button -->
                <button @click="sidebarOpen = !sidebarOpen" class="text-gray-600 lg:hidden hover:text-gray-900">
                    <i class="text-xl fas fa-bars"></i>
                </button>

                <!-- Page Title -->
                <h1 class="hidden text-xl font-semibold text-gray-800 md:block">
                    @yield('page-title', 'Dashboard')
                </h1>

                <!-- Right Section -->
                <div class="flex items-center space-x-4">
                    <!-- Notifications -->
                    {{-- <button class="relative text-gray-600 hover:text-gray-900">
                        <i class="text-xl fas fa-bell"></i>
                        <span
                            class="absolute flex items-center justify-center w-5 h-5 text-xs text-white bg-red-500 rounded-full -top-1 -right-1">3</span>
                    </button> --}}

                    <!-- User Menu -->
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center space-x-2 text-gray-700 hover:text-gray-900">
                            <span class="hidden md:inline">{{ auth()->user()->name ?? 'Admin' }}</span>
                            <i class="text-sm fas fa-chevron-down"></i>
                        </button>

                        <div x-show="open" @click.away="open = false" x-cloak
                            class="absolute right-0 w-48 py-2 mt-2 bg-white rounded-lg shadow-lg">
                            <div class="p-4 border-t">
                                <div class="flex items-center">
                                    <div
                                        class="flex items-center justify-center w-10 h-10 font-bold text-white bg-green-600 rounded-full">
                                        {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                                    </div>
                                    <div class="flex-1 ml-3">
                                        <p class="text-sm font-medium text-gray-700">
                                            {{ auth()->user()->name ?? 'Admin' }}</p>
                                        <p class="text-xs text-gray-500">Administrateur</p>
                                    </div>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="text-gray-400 hover:text-red-600">
                                            <i class="fas fa-sign-out-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Page Content -->
        <main class="p-6">
            @if (session('success'))
                <div class="p-4 mb-6 border-l-4 border-green-500 rounded bg-green-50">
                    <div class="flex items-center">
                        <i class="mr-3 text-green-500 fas fa-check-circle"></i>
                        <p class="text-green-700">{{ session('success') }}</p>
                    </div>
                </div>
            @endif

            @if (session('error'))
                <div class="p-4 mb-6 border-l-4 border-red-500 rounded bg-red-50">
                    <div class="flex items-center">
                        <i class="mr-3 text-red-500 fas fa-exclamation-circle"></i>
                        <p class="text-red-700">{{ session('error') }}</p>
                    </div>
                </div>
            @endif

            @yield('content')
        </main>
    </div>

    <!-- Mobile Sidebar Overlay -->
    <div x-show="sidebarOpen" @click="sidebarOpen = false" x-cloak
        class="fixed inset-0 z-40 bg-black bg-opacity-50 lg:hidden"></div>

    @stack('scripts')
</body>

</html>
