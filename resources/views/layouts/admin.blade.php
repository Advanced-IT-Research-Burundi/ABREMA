<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - ABREMA Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f0fdf4',
                            100: '#dcfce7',
                            200: '#bbf7d0',
                            300: '#86efac',
                            400: '#4ade80',
                            500: '#22c55e',
                            600: '#16a34a',
                            700: '#15803d',
                            800: '#166534',
                            900: '#14532d',
                        },
                        burgundy: {
                            50: '#fef2f2',
                            100: '#fee2e2',
                            200: '#fecaca',
                            300: '#fca5a5',
                            400: '#f87171',
                            500: '#ef4444',
                            600: '#dc2626',
                            700: '#991b1b',
                            800: '#7f1d1d',
                            900: '#450a0a',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        [x-cloak] { display: none !important; }
    </style>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-50" x-data="{ sidebarOpen: true, mobileMenuOpen: false }">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <aside 
            x-show="sidebarOpen || mobileMenuOpen"
            @click.away="mobileMenuOpen = false"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="-translate-x-full"
            x-transition:enter-end="translate-x-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="translate-x-0"
            x-transition:leave-end="-translate-x-full"
            class="fixed lg:static inset-y-0 left-0 z-50 w-64 bg-white border-r border-gray-200 overflow-y-auto"
            :class="{'lg:w-64': sidebarOpen, 'lg:w-20': !sidebarOpen}"
        >
            <!-- Logo -->
            <div class="flex items-center justify-center h-16 px-4 border-b border-gray-200 bg-gradient-to-r from-primary-700 to-primary-600">
                <img src="https://abrema.bi/assets/logo/logo.png" alt="ABREMA" class="h-10">
                <span x-show="sidebarOpen" class="ml-3 text-white font-bold text-lg">ABREMA</span>
            </div>

            <!-- Navigation -->
            <nav class="p-4 space-y-1">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-primary-50 hover:text-primary-700 transition {{ request()->routeIs('admin.dashboard') ? 'bg-primary-50 text-primary-700 font-semibold' : '' }}">
                    <i class="fas fa-chart-line w-5"></i>
                    <span x-show="sidebarOpen" class="ml-3">Dashboard</span>
                </a>

                <!-- Médicaments -->
                <div x-data="{ open: {{ request()->routeIs('admin.produits.*') ? 'true' : 'false' }} }">
                    <button @click="open = !open" class="w-full flex items-center justify-between px-4 py-3 text-gray-700 rounded-lg hover:bg-primary-50 hover:text-primary-700 transition">
                        <div class="flex items-center">
                            <i class="fas fa-pills w-5"></i>
                            <span x-show="sidebarOpen" class="ml-3">Médicaments</span>
                        </div>
                        <i x-show="sidebarOpen" :class="open ? 'fa-chevron-up' : 'fa-chevron-down'" class="fas text-xs"></i>
                    </button>
                    <div x-show="open && sidebarOpen" x-collapse class="ml-8 mt-1 space-y-1">
                        <a href="{{ route('admin.produits.index') }}" class="block px-4 py-2 text-sm text-gray-600 rounded-lg hover:bg-primary-50 hover:text-primary-700">Liste</a>
                        <a href="{{ route('admin.produits.create') }}" class="block px-4 py-2 text-sm text-gray-600 rounded-lg hover:bg-primary-50 hover:text-primary-700">Ajouter</a>
                    </div>
                </div>

                <!-- Actualités -->
                <div x-data="{ open: {{ request()->routeIs('admin.actualites.*') ? 'true' : 'false' }} }">
                    <button @click="open = !open" class="w-full flex items-center justify-between px-4 py-3 text-gray-700 rounded-lg hover:bg-primary-50 hover:text-primary-700 transition">
                        <div class="flex items-center">
                            <i class="fas fa-newspaper w-5"></i>
                            <span x-show="sidebarOpen" class="ml-3">Actualités</span>
                        </div>
                        <i x-show="sidebarOpen" :class="open ? 'fa-chevron-up' : 'fa-chevron-down'" class="fas text-xs"></i>
                    </button>
                    <div x-show="open && sidebarOpen" x-collapse class="ml-8 mt-1 space-y-1">
                        <a href="{{ route('admin.actualites.index') }}" class="block px-4 py-2 text-sm text-gray-600 rounded-lg hover:bg-primary-50 hover:text-primary-700">Liste</a>
                        <a href="{{ route('admin.actualites.create') }}" class="block px-4 py-2 text-sm text-gray-600 rounded-lg hover:bg-primary-50 hover:text-primary-700">Ajouter</a>
                    </div>
                </div>

                <!-- Publications -->
                <div x-data="{ open: {{ request()->routeIs('admin.publications.*') ? 'true' : 'false' }} }">
                    <button @click="open = !open" class="w-full flex items-center justify-between px-4 py-3 text-gray-700 rounded-lg hover:bg-primary-50 hover:text-primary-700 transition">
                        <div class="flex items-center">
                            <i class="fas fa-book w-5"></i>
                            <span x-show="sidebarOpen" class="ml-3">Publications</span>
                        </div>
                        <i x-show="sidebarOpen" :class="open ? 'fa-chevron-up' : 'fa-chevron-down'" class="fas text-xs"></i>
                    </button>
                    <div x-show="open && sidebarOpen" x-collapse class="ml-8 mt-1 space-y-1">
                        <a href="{{ route('admin.publications.index') }}" class="block px-4 py-2 text-sm text-gray-600 rounded-lg hover:bg-primary-50 hover:text-primary-700">Liste</a>
                        <a href="{{ route('admin.publications.create') }}" class="block px-4 py-2 text-sm text-gray-600 rounded-lg hover:bg-primary-50 hover:text-primary-700">Ajouter</a>
                    </div>
                </div>

                <!-- Textes Réglementaires -->
                <div x-data="{ open: {{ request()->routeIs('admin.textes.*') ? 'true' : 'false' }} }">
                    <button @click="open = !open" class="w-full flex items-center justify-between px-4 py-3 text-gray-700 rounded-lg hover:bg-primary-50 hover:text-primary-700 transition">
                        <div class="flex items-center">
                            <i class="fas fa-gavel w-5"></i>
                            <span x-show="sidebarOpen" class="ml-3">Textes Réglementaires</span>
                        </div>
                        <i x-show="sidebarOpen" :class="open ? 'fa-chevron-up' : 'fa-chevron-down'" class="fas text-xs"></i>
                    </button>
                    <div x-show="open && sidebarOpen" x-collapse class="ml-8 mt-1 space-y-1">
                        <a href="{{ route('admin.texte-reglementaires.index') }}" class="block px-4 py-2 text-sm text-gray-600 rounded-lg hover:bg-primary-50 hover:text-primary-700">Liste</a>
                        <a href="{{ route('admin.texte-reglementaires.create') }}" class="block px-4 py-2 text-sm text-gray-600 rounded-lg hover:bg-primary-50 hover:text-primary-700">Ajouter</a>
                    </div>
                </div>

                <a href="{{ route('admin.colis.index') }}" class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-primary-50 hover:text-primary-700 transition {{ request()->routeIs('admin.colis.*') ? 'bg-primary-50 text-primary-700 font-semibold' : '' }}">
                    <i class="fas fa-box w-5"></i>
                    <span x-show="sidebarOpen" class="ml-3">Colis</span>
                    @if(isset($stats['colis']) && $stats['colis'] > 0)
                        <span x-show="sidebarOpen" class="ml-auto bg-red-500 text-white text-xs px-2 py-1 rounded-full">{{ $stats['colis'] }}</span>
                    @endif
                </a>

                <a href="{{ route('admin.partenaires.index') }}" class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-primary-50 hover:text-primary-700 transition {{ request()->routeIs('admin.partenaires.*') ? 'bg-primary-50 text-primary-700 font-semibold' : '' }}">
                    <i class="fas fa-handshake w-5"></i>
                    <span x-show="sidebarOpen" class="ml-3">Partenaires</span>
                </a>

                <a href="{{ route('admin.equipe-directions.index') }}" class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-primary-50 hover:text-primary-700 transition {{ request()->routeIs('admin.equipe-directions.*') ? 'bg-primary-50 text-primary-700 font-semibold' : '' }}">
                    <i class="fas fa-users w-5"></i>
                    <span x-show="sidebarOpen" class="ml-3">Équipe Direction</span>
                </a>

                <a href="{{ route('admin.clients.index') }}" class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-primary-50 hover:text-primary-700 transition {{ request()->routeIs('admin.clients.*') ? 'bg-primary-50 text-primary-700 font-semibold' : '' }}">
                    <i class="fas fa-user-tie w-5"></i>
                    <span x-show="sidebarOpen" class="ml-3">Clients</span>
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Header -->
            <header class="bg-white border-b border-gray-200 z-10">
                <div class="flex items-center justify-between px-6 py-4">
                    <div class="flex items-center space-x-4">
                        <button @click="sidebarOpen = !sidebarOpen" class="hidden lg:block text-gray-500 hover:text-gray-700">
                            <i class="fas fa-bars text-xl"></i>
                        </button>
                        <button @click="mobileMenuOpen = !mobileMenuOpen" class="lg:hidden text-gray-500 hover:text-gray-700">
                            <i class="fas fa-bars text-xl"></i>
                        </button>
                        <h1 class="text-xl font-semibold text-gray-800">@yield('page-title')</h1>
                    </div>

                    <div class="flex items-center space-x-4">
                        <!-- Notifications -->
                        <div x-data="{ open: false }" class="relative">
                            <button @click="open = !open" class="relative p-2 text-gray-500 hover:text-gray-700 hover:bg-gray-100 rounded-full">
                                <i class="fas fa-bell text-xl"></i>
                                @if(isset($stats['colis']) && $stats['colis'] > 0)
                                    <span class="absolute top-0 right-0 w-5 h-5 bg-red-500 text-white text-xs rounded-full flex items-center justify-center">{{ $stats['colis'] }}</span>
                                @endif
                            </button>
                            <div x-show="open" @click.away="open = false" x-cloak class="absolute right-0 mt-2 w-80 bg-white rounded-lg shadow-lg border border-gray-200">
                                <div class="p-4 border-b">
                                    <h3 class="font-semibold text-gray-800">Notifications</h3>
                                </div>
                                <div class="max-h-96 overflow-y-auto">
                                    <a href="{{ route('admin.colis.index') }}" class="block p-4 hover:bg-gray-50 border-b">
                                        <div class="flex items-start">
                                            <div class="w-10 h-10 bg-red-100 rounded-full flex items-center justify-center">
                                                <i class="fas fa-box text-red-600"></i>
                                            </div>
                                            <div class="ml-3 flex-1">
                                                <p class="text-sm text-gray-800">{{ $stats['colis'] ?? 0 }} nouveaux colis en attente</p>
                                                <p class="text-xs text-gray-500 mt-1">Il y a quelques minutes</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- User Menu -->
                        <div x-data="{ open: false }" class="relative">
                            <button @click="open = !open" class="flex items-center space-x-3 p-2 hover:bg-gray-100 rounded-lg">
                                <div class="w-8 h-8 bg-primary-600 rounded-full flex items-center justify-center">
                                    <span class="text-white font-semibold text-sm">{{ substr(auth()->user()->name ?? 'A', 0, 1) }}</span>
                                </div>
                                <span class="hidden md:block text-sm font-medium text-gray-700">{{ auth()->user()->name ?? 'Admin' }}</span>
                                <i class="fas fa-chevron-down text-xs text-gray-500"></i>
                            </button>
                            <div x-show="open" @click.away="open = false" x-cloak class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200">
                                {{-- <a href="{{ route('admin.profile') }}" class="block px-4 py-3 text-sm text-gray-700 hover:bg-gray-50">
                                    <i class="fas fa-user mr-2"></i> Profil
                                </a> --}}
                                {{-- <a href="{{ route('admin.settings') }}" class="block px-4 py-3 text-sm text-gray-700 hover:bg-gray-50">
                                    <i class="fas fa-cog mr-2"></i> Paramètres
                                </a> --}}
                                <hr class="my-1">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="w-full text-left px-4 py-3 text-sm text-red-600 hover:bg-gray-50">
                                        <i class="fas fa-sign-out-alt mr-2"></i> Déconnexion
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto p-6">
                @if(session('success'))
                    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)" class="mb-6 bg-green-50 border-l-4 border-green-500 p-4 rounded-lg">
                        <div class="flex items-center">
                            <i class="fas fa-check-circle text-green-500 mr-3"></i>
                            <p class="text-green-800">{{ session('success') }}</p>
                        </div>
                    </div>
                @endif

                @if(session('error'))
                    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)" class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded-lg">
                        <div class="flex items-center">
                            <i class="fas fa-exclamation-circle text-red-500 mr-3"></i>
                            <p class="text-red-800">{{ session('error') }}</p>
                        </div>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>