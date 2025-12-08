<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Administration ABREMA</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #1a5490;
            --primary-dark: #0f3a6b;
            --secondary: #e63946;
            --success: #27ae60;
            --warning: #f39c12;
            --danger: #e74c3c;
            --info: #3498db;
            --light: #f8f9fa;
            --dark: #2c3e50;
            --white: #ffffff;
            --gray-100: #f8f9fa;
            --gray-200: #e9ecef;
            --gray-300: #dee2e6;
            --gray-400: #ced4da;
            --gray-600: #6c757d;
            --gray-800: #343a40;
            --sidebar-width: 260px;
            --header-height: 70px;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: var(--gray-100);
            color: var(--dark);
        }

        /* SIDEBAR */
        .admin-sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: var(--sidebar-width);
            height: 100vh;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: var(--white);
            overflow-y: auto;
            transition: all 0.3s ease;
            z-index: 1000;
            box-shadow: 2px 0 10px rgba(0,0,0,0.1);
        }

        .admin-sidebar::-webkit-scrollbar {
            width: 6px;
        }

        .admin-sidebar::-webkit-scrollbar-thumb {
            background: rgba(255,255,255,0.3);
            border-radius: 3px;
        }

        .sidebar-logo {
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            background: rgba(0,0,0,0.1);
        }

        .sidebar-logo img {
            width: 50px;
            height: 50px;
            margin-bottom: 10px;
        }

        .sidebar-logo h2 {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .sidebar-logo p {
            font-size: 12px;
            opacity: 0.8;
        }

        .sidebar-menu {
            padding: 20px 0;
            list-style: none;
        }

        .sidebar-menu li {
            margin-bottom: 5px;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            transition: all 0.3s ease;
            position: relative;
        }

        .sidebar-menu a:hover,
        .sidebar-menu a.active {
            background: rgba(255,255,255,0.1);
            color: var(--white);
        }

        .sidebar-menu a::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 4px;
            background: var(--secondary);
            transform: scaleY(0);
            transition: transform 0.3s ease;
        }

        .sidebar-menu a.active::before,
        .sidebar-menu a:hover::before {
            transform: scaleY(1);
        }

        .sidebar-menu a i {
            width: 24px;
            margin-right: 12px;
            font-size: 16px;
        }

        .menu-label {
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: rgba(255,255,255,0.5);
            padding: 15px 20px 10px;
            font-weight: 600;
        }

        /* HEADER */
        .admin-header {
            position: fixed;
            left: var(--sidebar-width);
            top: 0;
            right: 0;
            height: var(--header-height);
            background: var(--white);
            border-bottom: 1px solid var(--gray-200);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
            z-index: 999;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .sidebar-toggle {
            background: none;
            border: none;
            font-size: 20px;
            color: var(--dark);
            cursor: pointer;
            padding: 8px;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .sidebar-toggle:hover {
            background: var(--gray-100);
        }

        .header-search {
            display: flex;
            align-items: center;
            background: var(--gray-100);
            border-radius: 25px;
            padding: 8px 20px;
            width: 300px;
        }

        .header-search input {
            border: none;
            background: none;
            outline: none;
            width: 100%;
            font-size: 14px;
            margin-left: 10px;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .view-site-btn {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: var(--white);
            border: none;
            padding: 10px 20px;
            border-radius: 25px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .view-site-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(26, 84, 144, 0.3);
        }

        .header-notifications {
            position: relative;
            cursor: pointer;
        }

        .notification-icon {
            font-size: 20px;
            color: var(--gray-600);
            position: relative;
        }

        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background: var(--danger);
            color: var(--white);
            font-size: 10px;
            padding: 2px 5px;
            border-radius: 10px;
            min-width: 18px;
            text-align: center;
        }

        .header-profile {
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
            padding: 5px 10px;
            border-radius: 25px;
            transition: all 0.3s ease;
        }

        .header-profile:hover {
            background: var(--gray-100);
        }

        .profile-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-weight: 600;
        }

        .profile-info {
            text-align: left;
        }

        .profile-name {
            font-size: 14px;
            font-weight: 600;
            color: var(--dark);
        }

        .profile-role {
            font-size: 12px;
            color: var(--gray-600);
        }

        /* MAIN CONTENT */
        .admin-main {
            margin-left: var(--sidebar-width);
            margin-top: var(--header-height);
            padding: 30px;
            min-height: calc(100vh - var(--header-height));
        }

        .page-header {
            margin-bottom: 30px;
        }

        .page-title {
            font-size: 28px;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 5px;
        }

        .page-breadcrumb {
            display: flex;
            gap: 10px;
            font-size: 14px;
            color: var(--gray-600);
        }

        .page-breadcrumb a {
            color: var(--primary);
            text-decoration: none;
        }

        /* CARDS */
        .card {
            background: var(--white);
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            padding: 25px;
            margin-bottom: 20px;
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid var(--gray-200);
        }

        .card-title {
            font-size: 18px;
            font-weight: 600;
            color: var(--dark);
        }

        /* BUTTONS */
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
        }

        .btn-primary {
            background: var(--primary);
            color: var(--white);
        }

        .btn-primary:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(26, 84, 144, 0.3);
        }

        .btn-success { background: var(--success); color: var(--white); }
        .btn-danger { background: var(--danger); color: var(--white); }
        .btn-warning { background: var(--warning); color: var(--white); }
        .btn-info { background: var(--info); color: var(--white); }

        .btn-sm {
            padding: 6px 12px;
            font-size: 12px;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .admin-sidebar {
                transform: translateX(-100%);
            }

            .admin-sidebar.active {
                transform: translateX(0);
            }

            .admin-header {
                left: 0;
            }

            .admin-main {
                margin-left: 0;
            }

            .header-search {
                display: none;
            }
        }
    </style>
    @yield('styles')
</head>
<body>
    <!-- SIDEBAR -->
    <aside class="admin-sidebar" id="adminSidebar">
        <div class="sidebar-logo">
            <img src="{{ asset('assets/images/favicon.png') }}" alt="ABREMA Logo">
            <h2>ABREMA</h2>
            <p>Administration</p>
        </div>

        <ul class="sidebar-menu">
            <li>
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="menu-label">GESTION</li>

            <li>
                <a href="{{ route('admin.actualites.index') }}" class="{{ request()->routeIs('admin.actualites.*') ? 'active' : '' }}">
                    <i class="fas fa-newspaper"></i>
                    <span>Actualités</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.publications.index') }}" class="{{ request()->routeIs('admin.publications.*') ? 'active' : '' }}">
                    <i class="fas fa-book"></i>
                    <span>Publications</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.avis-publics.index') }}" class="{{ request()->routeIs('admin.avis-publics.*') ? 'active' : '' }}">
                    <i class="fas fa-bullhorn"></i>
                    <span>Avis Publics</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.texte-reglementaires.index') }}" class="{{ request()->routeIs('admin.texte-reglementaires.*') ? 'active' : '' }}">
                    <i class="fas fa-file-contract"></i>
                    <span>Textes Réglementaires</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.equipe-directions.index') }}" class="{{ request()->routeIs('admin.equipe-directions.*') ? 'active' : '' }}">
                    <i class="fas fa-users"></i>
                    <span>Équipe Direction</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.partenaires.index') }}" class="{{ request()->routeIs('admin.partenaires.*') ? 'active' : '' }}">
                    <i class="fas fa-handshake"></i>
                    <span>Partenaires</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.clients.index') }}" class="{{ request()->routeIs('admin.clients.*') ? 'active' : '' }}">
                    <i class="fas fa-user-tie"></i>
                    <span>Clients</span>
                </a>
            </li>

            <li class="menu-label">SERVICES</li>

            <li>
                <a href="{{ route('admin.colis.index') }}" class="{{ request()->routeIs('admin.colis.*') ? 'active' : '' }}">
                    <i class="fas fa-box"></i>
                    <span>Inspection Colis</span>
                </a>
            </li>

            <li class="menu-label">PARAMÈTRES</li>

            {{-- <li>
                <a href="{{ route('admin.users.index') }}" class="{{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                    <i class="fas fa-users-cog"></i>
                    <span>Utilisateurs</span>
                </a>
            </li> --}}

            {{-- <li>
                <a href="{{ route('admin.settings') }}" class="{{ request()->routeIs('admin.settings') ? 'active' : '' }}">
                    <i class="fas fa-cog"></i>
                    <span>Paramètres</span>
                </a>
            </li> --}}

            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Déconnexion</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </aside>

    <!-- HEADER -->
    <header class="admin-header">
        <div class="header-left">
            <button class="sidebar-toggle" id="sidebarToggle">
                <i class="fas fa-bars"></i>
            </button>

            <div class="header-search">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Rechercher...">
            </div>
        </div>

        <div class="header-right">
            <a href="{{ route('home') }}" class="view-site-btn" target="_blank">
                <i class="fas fa-external-link-alt"></i>
                Voir le site
            </a>

            <div class="header-notifications">
                <i class="fas fa-bell notification-icon"></i>
                <span class="notification-badge">5</span>
            </div>

            <div class="header-profile">
                <div class="profile-avatar">
                    {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
                </div>
                <div class="profile-info">
                    <div class="profile-name">{{ Auth::user()->name ?? 'Admin' }}</div>
                    <div class="profile-role">Administrateur</div>
                </div>
            </div>
        </div>
    </header>

    <!-- MAIN CONTENT -->
    <main class="admin-main">
        @yield('content')
    </main>

    <script>
        // Sidebar Toggle
        const sidebarToggle = document.getElementById('sidebarToggle');
        const adminSidebar = document.getElementById('adminSidebar');

        sidebarToggle.addEventListener('click', () => {
            adminSidebar.classList.toggle('active');
        });

        // Close sidebar on mobile when clicking outside
        document.addEventListener('click', (e) => {
            if (window.innerWidth <= 768) {
                if (!adminSidebar.contains(e.target) && !sidebarToggle.contains(e.target)) {
                    adminSidebar.classList.remove('active');
                }
            }
        });
    </script>
    @yield('scripts')
</body>
</html>