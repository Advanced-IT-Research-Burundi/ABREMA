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
        [x-cloak] { display: none !important; }
        .abrema-green { background-color: #2d7a3e; }
        .abrema-red { background-color: #8b1a1a; }
    </style>
    
    @stack('styles')
</head>
<body class="bg-gray-50" x-data="{ sidebarOpen: false }">
    
    <!-- Sidebar -->
    <aside 
        class="fixed inset-y-0 left-0 z-50 w-64 bg-white shadow-lg transform transition-transform duration-300 ease-in-out lg:translate-x-0"
        :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
    >
        <!-- Logo -->
        <div class="flex items-center justify-center h-20 border-b px-4 abrema-green">
            <img src="/images/logo-abrema.png" alt="ABREMA" class="h-12" onerror="this.style.display='none'">
            <span class="text-white font-bold text-xl ml-2">ABREMA</span>
        </div>

        <nav class="sidebar-menu">
            <div class="menu-section">
                <div class="menu-section-title">Principal</div>
                <div class="menu-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-th-large"></i>
                        <span>Dashboard</span>
                    </a>
                </div>
            </div>

            <div class="menu-section">
                <div class="menu-section-title">Gestion des Contenus</div>
                <div class="menu-item {{ request()->routeIs('admin.sliders.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.sliders.index') }}">
                        <i class="fas fa-images"></i>
                        <span>Sliders</span>
                    </a>
                </div>
                <div class="menu-item {{ request()->routeIs('admin.publications.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.publications.index') }}">
                        <i class="fas fa-newspaper"></i>
                        <span>Publications</span>
                    </a>
                </div>
                <div class="menu-item {{ request()->routeIs('admin.notifications.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.notifications.index') }}">
                        <i class="fas fa-bell"></i>
                        <span>Notifications</span>
                    </a>
                </div>
                <div class="menu-item {{ request()->routeIs('admin.avis-publics.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.avis-publics.index') }}">
                        <i class="fas fa-bullhorn"></i>
                        <span>Avis Publics</span>
                    </a>
                </div>
            </div>

            <div class="menu-section">
                <div class="menu-section-title">Médicaments</div>
                <div class="menu-item {{ request()->routeIs('admin.produits.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.produits.index') }}">
                        <i class="fas fa-pills"></i>
                        <span>Produits</span>
                    </a>
                </div>
                <div class="menu-item {{ request()->routeIs('admin.points-entree.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.point-entrees.index') }}">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Points d'entrée</span>
                    </a>
                </div>
                <div class="menu-item {{ request()->routeIs('admin.actualites.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.actualites.index') }}">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Actualites</span>
                    </a>
                </div>
            </div>

            <div class="menu-section">
                <div class="menu-section-title">Laboratoire</div>
                <div class="menu-item {{ request()->routeIs('admin.images-labo.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.image-labo.index') }}">
                        <i class="fas fa-flask"></i>
                        <span>Galerie Labo</span>
                    </a>
                </div>
            </div>

            <div class="menu-section">
                <div class="menu-section-title">Organisation</div>
                <div class="menu-item {{ request()->routeIs('admin.equipe-direction.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.equipe-directions.index') }}">
                        <i class="fas fa-users"></i>
                        <span>Équipe Direction</span>
                    </a>
                </div>
                <div class="menu-item {{ request()->routeIs('admin.partenaires.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.partenaires.index') }}">
                        <i class="fas fa-handshake"></i>
                        <span>Partenaires</span>
                    </a>
                </div>
                <div class="menu-item {{ request()->routeIs('admin.clients.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.clients.index') }}">
                        <i class="fas fa-handshake"></i>
                        <span>Clients</span>
                    </a>
                </div>
            </div>

            <div class="menu-section">
                <div class="menu-section-title">Documents</div>
                <div class="menu-item {{ request()->routeIs('admin.textes-reglementaires.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.texte-reglementaires.index') }}">
                        <i class="fas fa-file-alt"></i>
                        <span>Textes Réglementaires</span>
                    </a>
                </div>
            </div>

            {{-- <div class="menu-section">
                <div class="menu-section-title">Services</div>
                <div class="menu-item {{ request()->routeIs('admin.colis.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.colis.index') }}">
                        <i class="fas fa-box"></i>
                        <span>Colis</span>
                        <span class="menu-badge">{{ \App\Models\Colis::count() }}</span>
                    </a>
                </div>
            </div> --}}

            <div class="menu-section">
                <li>

                    <a href="{{ route('home') }}" target="_blank">
                        <i class="fas fa-globe" style=""></i>
                        <span>Voir le site</span>
                    </a>
                </li>
            </div>
        </nav>
        
        <!-- User Section -->
        <div class="border-t p-4">
            <div class="flex items-center">
                <div class="w-10 h-10 bg-green-600 rounded-full flex items-center justify-center text-white font-bold">
                    {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                </div>
                <div class="ml-3 flex-1">
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
        <header class="bg-white shadow-sm sticky top-0 z-40">
            <div class="flex items-center justify-between h-16 px-4">
                <!-- Mobile Menu Button -->
                <button 
                    @click="sidebarOpen = !sidebarOpen"
                    class="lg:hidden text-gray-600 hover:text-gray-900"
                >
                    <i class="fas fa-bars text-xl"></i>
                </button>
                
                <!-- Page Title -->
                <h1 class="text-xl font-semibold text-gray-800 hidden md:block">
                    @yield('page-title', 'Dashboard')
                </h1>
                
                <!-- Right Section -->
                <div class="flex items-center space-x-4">
                    <!-- Notifications -->
                    <button class="relative text-gray-600 hover:text-gray-900">
                        <i class="fas fa-bell text-xl"></i>
                        <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs w-5 h-5 rounded-full flex items-center justify-center">3</span>
                    </button>
                    
                    <!-- User Menu -->
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center space-x-2 text-gray-700 hover:text-gray-900">
                            <span class="hidden md:inline">{{ auth()->user()->name ?? 'Admin' }}</span>
                            <i class="fas fa-chevron-down text-sm"></i>
                        </button>
                        
                        <div 
                            x-show="open" 
                            @click.away="open = false"
                            x-cloak
                            class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2"
                        >
                            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                                <i class="fas fa-user mr-2"></i> Profil
                            </a>
                            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                                <i class="fas fa-cog mr-2"></i> Paramètres
                            </a>
                            <hr class="my-2">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 text-red-600 hover:bg-gray-100">
                                    <i class="fas fa-sign-out-alt mr-2"></i> Déconnexion
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        
        <!-- Page Content -->
        <main class="p-6">
            @if(session('success'))
                <div class="mb-6 bg-green-50 border-l-4 border-green-500 p-4 rounded">
                    <div class="flex items-center">
                        <i class="fas fa-check-circle text-green-500 mr-3"></i>
                        <p class="text-green-700">{{ session('success') }}</p>
                    </div>
                </div>
            @endif
            
            @if(session('error'))
                <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded">
                    <div class="flex items-center">
                        <i class="fas fa-exclamation-circle text-red-500 mr-3"></i>
                        <p class="text-red-700">{{ session('error') }}</p>
                    </div>
                </div>
            @endif
            
            @yield('content')
        </main>
    </div>
    
    <!-- Mobile Sidebar Overlay -->
    <div 
        x-show="sidebarOpen" 
        @click="sidebarOpen = false"
        x-cloak
        class="fixed inset-0 bg-black bg-opacity-50 z-40 lg:hidden"
    ></div>
    
    @stack('scripts')
</body>
</html>