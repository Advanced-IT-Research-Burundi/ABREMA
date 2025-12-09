<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Administration') - ABREMA</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #2c7a4e;
            --secondary: #8b2332;
            --dark: #1a1a1a;
            --light: #f5f5f5;
            --border: #e0e0e0;
            --success: #28a745;
            --warning: #ffc107;
            --danger: #dc3545;
            --info: #17a2b8;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: var(--light);
            color: #333;
        }

        .admin-container {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 260px;
            background: linear-gradient(180deg, var(--primary) 0%, #1e5738 100%);
            color: white;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            transition: all 0.3s;
            z-index: 1000;
        }

        .sidebar-header {
            padding: 20px;
            background: rgba(0,0,0,0.2);
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .sidebar-logo {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .sidebar-logo img {
            width: 45px;
            height: 45px;
            border-radius: 8px;
        }

        .sidebar-logo h2 {
            font-size: 18px;
            font-weight: 600;
        }

        .sidebar-menu {
            padding: 20px 0;
        }

        .menu-section {
            margin-bottom: 25px;
        }

        .menu-section-title {
            padding: 0 20px 10px;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 1px;
            opacity: 0.6;
            font-weight: 600;
        }

        .menu-item {
            padding: 12px 20px;
            display: flex;
            align-items: center;
            gap: 12px;
            color: rgba(255,255,255,0.85);
            text-decoration: none;
            transition: all 0.2s;
            border-left: 3px solid transparent;
        }

        .menu-item:hover {
            background: rgba(255,255,255,0.1);
            color: white;
            border-left-color: #ffc107;
        }

        .menu-item.active {
            background: rgba(255,255,255,0.15);
            color: white;
            border-left-color: white;
            font-weight: 600;
        }

        .menu-item i {
            width: 20px;
            text-align: center;
        }

        /* Main Content */
        .main-content {
            margin-left: 260px;
            flex: 1;
            min-height: 100vh;
            background: var(--light);
        }

        /* Top Navigation */
        .top-nav {
            background: white;
            padding: 15px 30px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .top-nav-left h1 {
            font-size: 24px;
            color: var(--dark);
            font-weight: 600;
        }

        .top-nav-right {
            display: flex;
            gap: 20px;
            align-items: center;
        }

        .user-menu {
            position: relative;
        }

        .user-menu-toggle {
            display: flex;
            align-items: center;
            gap: 12px;
            cursor: pointer;
            padding: 8px 15px;
            border-radius: 8px;
            transition: background 0.2s;
        }

        .user-menu-toggle:hover {
            background: var(--light);
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
        }

        .user-dropdown {
            position: absolute;
            top: 100%;
            right: 0;
            margin-top: 10px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            min-width: 200px;
            display: none;
            z-index: 1000;
        }

        .user-dropdown.show {
            display: block;
        }

        .dropdown-item {
            padding: 12px 20px;
            display: flex;
            align-items: center;
            gap: 12px;
            color: #333;
            text-decoration: none;
            transition: background 0.2s;
            border-bottom: 1px solid var(--border);
        }

        .dropdown-item:last-child {
            border-bottom: none;
        }

        .dropdown-item:hover {
            background: var(--light);
        }

        .dropdown-item i {
            width: 20px;
            text-align: center;
        }

        .logout-form {
            margin: 0;
        }

        /* Content Area */
        .content {
            padding: 30px;
        }

        .page-header {
            margin-bottom: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .page-title {
            font-size: 28px;
            color: var(--dark);
            font-weight: 600;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.2s;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background: #1e5738;
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(44, 122, 78, 0.3);
        }

        .btn-success { background: var(--success); color: white; }
        .btn-danger { background: var(--danger); color: white; }
        .btn-warning { background: var(--warning); color: #333; }
        .btn-info { background: var(--info); color: white; }
        .btn-secondary { background: #6c757d; color: white; }

        .btn-success:hover { background: #218838; }
        .btn-danger:hover { background: #c82333; }
        .btn-warning:hover { background: #e0a800; }
        .btn-info:hover { background: #138496; }

        .btn-sm {
            padding: 6px 12px;
            font-size: 13px;
        }

        /* Cards */
        .card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
            margin-bottom: 20px;
        }

        .card-header {
            padding: 20px;
            border-bottom: 1px solid var(--border);
            font-weight: 600;
            font-size: 16px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-body {
            padding: 20px;
        }

        /* Alerts */
        .alert {
            padding: 15px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 12px;
            animation: slideDown 0.3s ease;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .alert-success { background: #d4edda; color: #155724; border-left: 4px solid var(--success); }
        .alert-danger { background: #f8d7da; color: #721c24; border-left: 4px solid var(--danger); }
        .alert-warning { background: #fff3cd; color: #856404; border-left: 4px solid var(--warning); }
        .alert-info { background: #d1ecf1; color: #0c5460; border-left: 4px solid var(--info); }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .main-content {
                margin-left: 0;
            }

            .sidebar.mobile-open {
                transform: translateX(0);
            }
        }
    </style>
    @yield('styles')
</head>
<body>
    <div class="admin-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <div class="sidebar-logo">
                    <img src="/images/ABREMA_LOGO.png" alt="ABREMA">
                    <div>
                        <h2>ABREMA</h2>
                        <small style="opacity: 0.7;">Administration</small>
                    </div>
                </div>
            </div>

            <nav class="sidebar-menu">
                <div class="menu-section">
                    <div class="menu-section-title">Principal</div>
                    <a href="{{ route('admin.dashboard') }}" class="menu-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="fas fa-home"></i>
                        <span>Tableau de bord</span>
                    </a>
                </div>

                <div class="menu-section">
                    <div class="menu-section-title">Médicaments</div>
                    <a href="{{ route('admin.produits.index') }}" class="menu-item {{ request()->routeIs('admin.produits.*') ? 'active' : '' }}">
                        <i class="fas fa-pills"></i>
                        <span>Produits</span>
                    </a>
                </div>

                <div class="menu-section">
                    <div class="menu-section-title">Gestion</div>
                    <a href="{{ route('admin.partenaires.index') }}" class="menu-item {{ request()->routeIs('admin.partenaires.*') ? 'active' : '' }}">
                        <i class="fas fa-handshake"></i>
                        <span>Partenaires</span>
                    </a>
                    <a href="{{ route('admin.clients.index') }}" class="menu-item {{ request()->routeIs('admin.clients.*') ? 'active' : '' }}">
                        <i class="fas fa-users"></i>
                        <span>Clients</span>
                    </a>
                    <a href="{{ route('admin.colis.index') }}" class="menu-item {{ request()->routeIs('admin.colis.*') ? 'active' : '' }}">
                        <i class="fas fa-box"></i>
                        <span>Colis</span>
                    </a>
                    <a href="{{ route('admin.equipe-directions.index') }}" class="menu-item {{ request()->routeIs('admin.equipe-directions.*') ? 'active' : '' }}">
                        <i class="fas fa-user-tie"></i>
                        <span>Équipe & Direction</span>
                    </a>
                </div>

                <div class="menu-section">
                    <div class="menu-section-title">Publications</div>
                    <a href="{{ route('admin.actualites.index') }}" class="menu-item {{ request()->routeIs('admin.actualites.*') ? 'active' : '' }}">
                        <i class="fas fa-newspaper"></i>
                        <span>Actualités</span>
                    </a>
                    <a href="{{ route('admin.publications.index') }}" class="menu-item {{ request()->routeIs('admin.publications.*') ? 'active' : '' }}">
                        <i class="fas fa-book"></i>
                        <span>Publications</span>
                    </a>
                    <a href="{{ route('admin.avis-publics.index') }}" class="menu-item {{ request()->routeIs('admin.avis-publics.*') ? 'active' : '' }}">
                        <i class="fas fa-bullhorn"></i>
                        <span>Avis publics</span>
                    </a>
                </div>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Top Navigation -->
            <nav class="top-nav">
                <div class="top-nav-left">
                    <h1>@yield('page-title', 'Administration')</h1>
                </div>
                <div class="top-nav-right">
                    <a href="{{ url('/') }}" class="btn btn-secondary btn-sm" target="_blank">
                        <i class="fas fa-external-link-alt"></i>
                        Voir le site
                    </a>
                    <div class="user-menu">
                        <div class="user-menu-toggle" onclick="toggleUserMenu()">
                            <div class="user-avatar">
                                {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                            </div>
                            <div>
                                <div style="font-weight: 600; font-size: 14px;">{{ auth()->user()->name ?? 'Admin' }}</div>
                                <div style="font-size: 12px; color: #666;">Administrateur</div>
                            </div>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="user-dropdown" id="userDropdown">
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-user"></i>
                                <span>Mon profil</span>
                            </a>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-cog"></i>
                                <span>Paramètres</span>
                            </a>
                            <form method="POST" action="{{ route('logout') }}" class="logout-form">
                                @csrf
                                <button type="submit" class="dropdown-item" style="width: 100%; background: none; cursor: pointer;">
                                    <i class="fas fa-sign-out-alt"></i>
                                    <span>Déconnexion</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Content -->
            <div class="content">
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
            </div>
        </main>
    </div>

    <script>
        function toggleUserMenu() {
            const dropdown = document.getElementById('userDropdown');
            dropdown.classList.toggle('show');
        }

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            const userMenu = document.querySelector('.user-menu');
            const dropdown = document.getElementById('userDropdown');
            
            if (!userMenu.contains(event.target)) {
                dropdown.classList.remove('show');
            }
        });
    </script>
    @yield('scripts')
</body>
</html>