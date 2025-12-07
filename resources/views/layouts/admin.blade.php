<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') - ABREMA Admin</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        /* =========================
           VARIABLES ABREMA
           ========================= */
        :root {
            --primary: #2C5AA0;
            --primary-dark: #1e4178;
            --primary-light: #3d6bb8;
            --secondary: #F8B739;
            --secondary-dark: #e0a428;
            --success: #2ECC71;
            --danger: #E74C3C;
            --warning: #F39C12;
            --info: #3498DB;
            --dark: #2C3E50;
            --light: #ECF0F1;
            --white: #FFFFFF;
            --gray-100: #F8F9FA;
            --gray-200: #E9ECEF;
            --gray-300: #DEE2E6;
            --gray-400: #CED4DA;
            --gray-500: #ADB5BD;
            --gray-600: #6C757D;
            --gray-700: #495057;
            --gray-800: #343A40;
            --gray-900: #212529;
            --border: #E0E6ED;
            --shadow-sm: 0 1px 3px rgba(0,0,0,0.08);
            --shadow-md: 0 4px 12px rgba(0,0,0,0.1);
            --shadow-lg: 0 8px 24px rgba(0,0,0,0.12);
            --radius-sm: 8px;
            --radius-md: 12px;
            --radius-lg: 16px;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            --sidebar-width: 280px;
            --header-height: 70px;
        }

        /* =========================
           RESET & BASE
           ========================= */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--gray-100);
            color: var(--gray-800);
            line-height: 1.6;
            overflow-x: hidden;
        }

        a {
            text-decoration: none;
            color: inherit;
            transition: var(--transition);
        }

        /* =========================
           SIDEBAR
           ========================= */
        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: var(--sidebar-width);
            height: 100vh;
            background: linear-gradient(180deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: var(--white);
            overflow-y: auto;
            z-index: 1000;
            box-shadow: 4px 0 20px rgba(0,0,0,0.1);
        }

        .sidebar::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar::-webkit-scrollbar-track {
            background: rgba(255,255,255,0.05);
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: rgba(255,255,255,0.2);
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
            background: var(--secondary);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: var(--dark);
            box-shadow: 0 4px 12px rgba(248, 183, 57, 0.3);
        }

        .sidebar-title h2 {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 2px;
        }

        .sidebar-title p {
            font-size: 12px;
            opacity: 0.8;
            font-weight: 500;
        }

        /* Menu */
        .sidebar-menu {
            padding: 20px 0;
        }

        .menu-section {
            margin-bottom: 25px;
        }

        .menu-section-title {
            padding: 8px 20px;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            opacity: 0.6;
            margin-bottom: 5px;
        }

        .menu-item {
            margin: 2px 10px;
            border-radius: var(--radius-sm);
            transition: var(--transition);
        }

        .menu-item a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 15px;
            color: rgba(255,255,255,0.85);
            border-radius: var(--radius-sm);
            position: relative;
            overflow: hidden;
        }

        .menu-item a::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            width: 4px;
            height: 100%;
            background: var(--secondary);
            transform: scaleY(0);
            transition: var(--transition);
        }

        .menu-item:hover a,
        .menu-item.active a {
            background: rgba(255,255,255,0.1);
            color: var(--white);
        }

        .menu-item.active a::before {
            transform: scaleY(1);
        }

        .menu-item a i {
            width: 20px;
            text-align: center;
            font-size: 18px;
        }

        .menu-item a span {
            font-size: 14px;
            font-weight: 500;
        }

        .menu-badge {
            margin-left: auto;
            background: var(--secondary);
            color: var(--dark);
            padding: 2px 8px;
            border-radius: 10px;
            font-size: 11px;
            font-weight: 700;
        }

        /* =========================
           MAIN WRAPPER
           ========================= */
        .main-wrapper {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* =========================
           HEADER
           ========================= */
        .header {
            height: var(--header-height);
            background: var(--white);
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: var(--shadow-sm);
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .menu-toggle {
            display: none;
            width: 40px;
            height: 40px;
            border-radius: var(--radius-sm);
            background: var(--gray-100);
            border: none;
            cursor: pointer;
            align-items: center;
            justify-content: center;
            color: var(--gray-600);
            transition: var(--transition);
        }

        .menu-toggle:hover {
            background: var(--gray-200);
            color: var(--primary);
        }

        .page-title h1 {
            font-size: 24px;
            font-weight: 700;
            color: var(--dark);
        }

        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            color: var(--gray-600);
            margin-top: 4px;
        }

        .breadcrumb a {
            color: var(--primary);
        }

        .breadcrumb a:hover {
            color: var(--primary-dark);
        }

        .breadcrumb span {
            color: var(--gray-400);
        }

        /* Header Right */
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
            border: 1px solid var(--border);
            border-radius: 25px;
            font-size: 14px;
            transition: var(--transition);
        }

        .header-search input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(44, 90, 160, 0.1);
        }

        .header-search i {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray-500);
        }

        .header-icon {
            position: relative;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--gray-100);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: var(--transition);
        }

        .header-icon:hover {
            background: var(--primary);
            color: var(--white);
        }

        .notification-badge {
            position: absolute;
            top: 8px;
            right: 8px;
            width: 8px;
            height: 8px;
            background: var(--danger);
            border-radius: 50%;
            border: 2px solid var(--white);
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 8px 15px 8px 8px;
            border-radius: 25px;
            cursor: pointer;
            transition: var(--transition);
        }

        .user-profile:hover {
            background: var(--gray-100);
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
            color: var(--white);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 16px;
        }

        .user-info {
            text-align: left;
        }

        .user-name {
            font-size: 14px;
            font-weight: 600;
            color: var(--dark);
        }

        .user-role {
            font-size: 12px;
            color: var(--gray-600);
        }

        .logout-btn {
            padding: 8px 20px;
            background: var(--danger);
            color: var(--white);
            border: none;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
        }

        .logout-btn:hover {
            background: #c0392b;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(231, 76, 60, 0.3);
        }

        /* =========================
           CONTENT
           ========================= */
        .content {
            flex: 1;
            padding: 30px;
        }

        /* Alerts */
        .alert {
            padding: 15px 20px;
            border-radius: var(--radius-md);
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 14px;
            animation: slideDown 0.3s ease;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .alert-success {
            background: #D4EDDA;
            color: #155724;
            border-left: 4px solid var(--success);
        }

        .alert-danger {
            background: #F8D7DA;
            color: #721C24;
            border-left: 4px solid var(--danger);
        }

        .alert i {
            font-size: 20px;
        }

        /* Cards */
        .card {
            background: var(--white);
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--border);
            overflow: hidden;
        }

        .card-header {
            padding: 20px 25px;
            border-bottom: 1px solid var(--border);
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: linear-gradient(to bottom, #FAFBFC, var(--white));
        }

        .card-title {
            font-size: 18px;
            font-weight: 700;
            color: var(--dark);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .card-body {
            padding: 25px;
        }

        /* Buttons */
        .btn {
            padding: 10px 20px;
            border-radius: var(--radius-sm);
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            border: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-sm {
            padding: 6px 15px;
            font-size: 13px;
        }

        .btn-primary {
            background: var(--primary);
            color: var(--white);
        }

        .btn-primary:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(44, 90, 160, 0.3);
        }

        .btn-secondary {
            background: var(--gray-200);
            color: var(--gray-700);
        }

        .btn-secondary:hover {
            background: var(--gray-300);
        }

        /* =========================
           RESPONSIVE
           ========================= */
        @media (max-width: 1024px) {
            :root {
                --sidebar-width: 260px;
            }

            .header-search input {
                width: 200px;
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                transition: var(--transition);
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .main-wrapper {
                margin-left: 0;
            }

            .menu-toggle {
                display: flex;
            }

            .header-search {
                display: none;
            }

            .user-info {
                display: none;
            }

            .content {
                padding: 20px 15px;
            }
        }
    </style>

    @stack('styles')
</head>

<body>
    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
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
                <div class="menu-section-title">Gestion Contenus</div>
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
                <div class="menu-item {{ request()->routeIs('admin.actualites.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.actualites.index') }}">
                        <i class="fas fa-bullhorn"></i>
                        <span>Actualités</span>
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
                        <i class="fas fa-megaphone"></i>
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
                        <span class="menu-badge">{{ \App\Models\Produit::count() }}</span>
                    </a>
                </div>
                <div class="menu-item {{ request()->routeIs('admin.point-entrees.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.point-entrees.index') }}">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Points d'Entrée</span>
                    </a>
                </div>
            </div>

            <div class="menu-section">
                <div class="menu-section-title">Laboratoire</div>
                <div class="menu-item {{ request()->routeIs('admin.image-labo.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.image-labo.index') }}">
                        <i class="fas fa-flask"></i>
                        <span>Galerie Labo</span>
                    </a>
                </div>
            </div>

            <div class="menu-section">
                <div class="menu-section-title">Organisation</div>
                <div class="menu-item {{ request()->routeIs('admin.equipe-directions.*') ? 'active' : '' }}">
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
                        <i class="fas fa-user-tie"></i>
                        <span>Clients</span>
                    </a>
                </div>
            </div>

            <div class="menu-section">
                <div class="menu-section-title">Documents</div>
                <div class="menu-item {{ request()->routeIs('admin.texte-reglementaires.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.texte-reglementaires.index') }}">
                        <i class="fas fa-file-alt"></i>
                        <span>Textes Réglementaires</span>
                    </a>
                </div>
                <div class="menu-item {{ request()->routeIs('admin.colis.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.colis.index') }}">
                        <i class="fas fa-box"></i>
                        <span>Colis</span>
                        <span class="menu-badge">{{ \App\Models\Colis::count() }}</span>
                    </a>
                </div>
            </div>

            <div class="menu-section">
                <div class="menu-item">
                    <a href="{{ route('home') }}" target="_blank">
                        <i class="fas fa-globe"></i>
                        <span>Voir le Site</span>
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
                <button class="menu-toggle" onclick="toggleSidebar()">
                    <i class="fas fa-bars"></i>
                </button>
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

                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="logout-btn">
                        <i class="fas fa-sign-out-alt"></i>
                        Déconnexion
                    </button>
                </form>
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

    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('active');
        }

        // Close sidebar on click outside (mobile)
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const menuToggle = document.querySelector('.menu-toggle');
            
            if (window.innerWidth <= 768) {
                if (!sidebar.contains(event.target) && !menuToggle.contains(event.target)) {
                    sidebar.classList.remove('active');
                }
            }
        });
    </script>

    @stack('scripts')
</body>
</html>