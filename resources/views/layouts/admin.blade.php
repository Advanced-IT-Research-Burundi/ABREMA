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
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary-color: #2ECC71;
            --secondary-color: #27AE60;
            --dark-color: #1A1A1A;
            --light-bg: #F8F9FA;
            --border-color: #E0E0E0;
            --text-dark: #2C3E50;
            --text-light: #7F8C8D;
            --sidebar-width: 260px;
            --header-height: 70px;
            --danger-color: #E74C3C;
            --warning-color: #F39C12;
            --info-color: #3498DB;
            --success-color: #2ECC71;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--light-bg);
            color: var(--text-dark);
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: var(--sidebar-width);
            height: 100vh;
            background: linear-gradient(135deg, #2ECC71 0%, #27AE60 100%);
            color: white;
            overflow-y: auto;
            transition: all 0.3s ease;
            z-index: 1000;
            box-shadow: 2px 0 15px rgba(0,0,0,0.1);
        }

        .sidebar::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar::-webkit-scrollbar-track {
            background: rgba(255,255,255,0.1);
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: rgba(255,255,255,0.3);
            border-radius: 3px;
        }

        .sidebar-header {
            padding: 25px 20px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .sidebar-logo {
            width: 50px;
            height: 50px;
            background: white;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: var(--primary-color);
            font-weight: bold;
        }

        .sidebar-title {
            flex: 1;
        }

        .sidebar-title h2 {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 2px;
        }

        .sidebar-title p {
            font-size: 12px;
            opacity: 0.8;
        }

        .sidebar-menu {
            padding: 20px 0;
        }

        .menu-section {
            margin-bottom: 30px;
        }

        .menu-section-title {
            padding: 0 20px 10px;
            font-size: 11px;
            text-transform: uppercase;
            font-weight: 600;
            opacity: 0.7;
            letter-spacing: 1px;
        }

        .menu-item {
            position: relative;
        }

        .menu-item a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 20px;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
            position: relative;
        }

        .menu-item a::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            width: 4px;
            height: 100%;
            background: white;
            transform: scaleY(0);
            transition: transform 0.3s ease;
        }

        .menu-item a:hover,
        .menu-item.active a {
            background: rgba(255,255,255,0.15);
        }

        .menu-item.active a::before {
            transform: scaleY(1);
        }

        .menu-item i {
            width: 20px;
            text-align: center;
            font-size: 16px;
        }

        .menu-item span {
            flex: 1;
            font-size: 14px;
            font-weight: 500;
        }

        .menu-badge {
            background: rgba(255,255,255,0.2);
            padding: 2px 8px;
            border-radius: 12px;
            font-size: 11px;
            font-weight: 600;
        }

        /* Main Content */
        .main-wrapper {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Header */
        .header {
            background: white;
            height: var(--header-height);
            padding: 0 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            position: sticky;
            top: 0;
            z-index: 999;
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .page-title h1 {
            font-size: 24px;
            font-weight: 700;
            color: var(--text-dark);
        }

        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
            color: var(--text-light);
            margin-top: 4px;
        }

        .breadcrumb a {
            color: var(--primary-color);
            text-decoration: none;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .header-search {
            position: relative;
        }

        .header-search input {
            width: 300px;
            padding: 10px 40px 10px 15px;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .header-search input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(46,204,113,0.1);
        }

        .header-search i {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-light);
        }

        .header-icon {
            position: relative;
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            color: var(--text-dark);
        }

        .header-icon:hover {
            background: var(--light-bg);
        }

        .notification-badge {
            position: absolute;
            top: 8px;
            right: 8px;
            width: 8px;
            height: 8px;
            background: var(--danger-color);
            border-radius: 50%;
            border: 2px solid white;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 8px 12px;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .user-profile:hover {
            background: var(--light-bg);
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 14px;
        }

        .user-info {
            display: flex;
            flex-direction: column;
        }

        .user-name {
            font-size: 14px;
            font-weight: 600;
            color: var(--text-dark);
        }

        .user-role {
            font-size: 12px;
            color: var(--text-light);
        }

        /* Content Area */
        .content {
            flex: 1;
            padding: 30px;
        }

        /* Cards */
        .card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            overflow: hidden;
        }

        .card-header {
            padding: 20px 25px;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .card-title {
            font-size: 18px;
            font-weight: 600;
            color: var(--text-dark);
        }

        .card-body {
            padding: 25px;
        }

        /* Buttons */
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
        }

        .btn-primary {
            background: var(--primary-color);
            color: white;
        }

        .btn-primary:hover {
            background: var(--secondary-color);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(46,204,113,0.3);
        }

        .btn-secondary {
            background: var(--light-bg);
            color: var(--text-dark);
        }

        .btn-secondary:hover {
            background: #E0E0E0;
        }

        .btn-danger {
            background: var(--danger-color);
            color: white;
        }

        .btn-sm {
            padding: 6px 12px;
            font-size: 13px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .main-wrapper {
                margin-left: 0;
            }

            .header-search {
                display: none;
            }
        }

        /* Alerts */
        .alert {
            padding: 15px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .alert-success {
            background: #D4EDDA;
            color: #155724;
            border: 1px solid #C3E6CB;
        }

        .alert-danger {
            background: #F8D7DA;
            color: #721C24;
            border: 1px solid #F5C6CB;
        }

        .alert-info {
            background: #D1ECF1;
            color: #0C5460;
            border: 1px solid #BEE5EB;
        }
    </style>

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
            @if(session('success'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i>
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
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