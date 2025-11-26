<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') - ABREMA Admin</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

    @stack('styles')
</head>

<body>
    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="sidebar-header">
            <div class="sidebar-logo">
                <i class="fas fa-capsules"></i>
            </div>
            <div class="sidebar-title">
                <h2>ABREMA</h2>
                <p>Administration</p>
            </div>
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
                        <span>Points d'Entrée</span>
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

            <div class="menu-section">
                <div class="menu-section-title">Services</div>
                <div class="menu-item {{ request()->routeIs('admin.colis.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.colis.index') }}">
                        <i class="fas fa-box"></i>
                        <span>Colis</span>
                        <span class="menu-badge">{{ \App\Models\Colis::count() }}</span>
                    </a>
                </div>
            </div>

            <div class="menu-section">
                <div class="menu-section-title">Système</div>
                <div class="menu-item {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                    <a href="#">
                        <i class="fas fa-user-cog"></i>
                        <span>Utilisateurs</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a href="#">
                        <i class="fas fa-cog"></i>
                        <span>Paramètres</span>
                    </a>
                </div>
            </div>
        </nav>
    </aside>

    <!-- Main Wrapper -->
    <div class="main-wrapper">
        <!-- Header -->
        <header class="header">
            <div class="header-left">
                <div class="page-title">
                    <h1>@yield('page-title', 'Dashboard')</h1>
                    @hasSection('breadcrumb')
                        <div class="breadcrumb">
                            @yield('breadcrumb')
                        </div>
                    @endif
                </div>
            </div>

            <div class="header-right">
                <div class="header-search">
                    <input type="text" placeholder="Rechercher...">
                    <i class="fas fa-search"></i>
                </div>

                <div class="header-icon">
                    <i class="fas fa-bell"></i>
                    <span class="notification-badge"></span>
                </div>

                <div class="user-profile">
                    <div class="user-avatar">
                        {{ substr(auth()->user()->name ?? 'Admin', 0, 1) }}
                    </div>
                    <div class="user-info">
                        <div class="user-name">{{ auth()->user()->name ?? 'Administrateur' }}</div>
                        <div class="user-role">{{ auth()->user()->role ?? 'Admin' }}</div>
                    </div>
                    <i class="fas fa-chevron-down"></i>
                </div>
            </div>
        </header>

        <!-- Content -->
        <main class="content">
            @if (session('success'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i>
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-circle"></i>
                    {{ session('error') }}
                </div>
            @endif

            @yield('content')
        </main>
    </div>

    @stack('scripts')
</body>
</html>
