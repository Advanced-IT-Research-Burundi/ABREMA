<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>ABREMA</title>
    <meta name="description"content="Template responsive inspiré (header, navbar, slider, actualités, publications, services, footer)." />
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"integrity="sha512-pap5Q+..."crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/user.css') }}" />
</head>

<body>
    <header class="header-top">
        <div class="container header-inner">
            <div class="brand">
                <div class="logo">ABREMA</div>
                <div>
                    <div class="title">ABREMA</div>
                    <div style="font-size:.86rem;color:#556;">Institution Nationale</div>
                </div>
            </div>

            <div class="header-right">
                <div class="contact"><i class="fas fa-phone-alt"></i> 115</div>
                <div class="socials">
                    <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
        </div>
    </header>
    <nav class="navbar navbar-expand-lg" style="background:var(--blue-900);padding:8px 0;">
        <div class="container-fluid">

            <!-- Logo -->
            <a class="navbar-brand text-white fw-bold" href="{{ route('home') }}">
                ABREMA
            </a>

            <!-- Burger -->
            <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarMain">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- MENU -->
            <div class="collapse navbar-collapse" id="navbarMain">

                <ul class="navbar-nav me-auto">

                    <!-- Accueil -->
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('home') }}">Accueil</a>
                    </li>

                    <!-- À propos -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" data-bs-toggle="dropdown">
                            À propos
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('about.profilabrema') }}">Profil ABREMA</a></li>
                            <li><a class="dropdown-item" href="{{ route('about.organigramme') }}">Organigramme</a></li>
                            <li><a class="dropdown-item" href="{{ route('about.equipe') }}">Équipe de Direction de l'ABREMA</a></li>
                            <li><a class="dropdown-item" href="{{ route('about.fonction') }}">Fonction réglementaire</a>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('about.qms') }}">QMS</a></li>
                        </ul>
                    </li>

                    <!-- Médicaments (with submenus) -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" data-bs-toggle="dropdown">
                            Médicaments
                        </a>

                        <ul class="dropdown-menu">

                            <!-- Sous-menu Enregistrement -->
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#">Enregistrement</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('medicament.produits') }}">Produits
                                            enregistrés</a></li>
                                    <li><a class="dropdown-item"
                                            href="{{ route('medicament.notification') }}">Notifications</a></li>
                                    <li><a class="dropdown-item" href="{{ route('medicament.textemedicament') }}">Textes
                                            réglementaires</a></li>
                                </ul>
                            </li>

                            <!-- Sous-menu Import / Export -->
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#">Import / Export</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('importexport.demande') }}">Demande
                                            d'importation</a></li>
                                    <li><a class="dropdown-item" href="{{ route('importexort.pointentree') }}">Points
                                            d'entrée</a></li>
                                    <li><a class="dropdown-item" href="{{ route('importexport.texteimport') }}">Textes
                                            réglementaires</a></li>
                                </ul>
                            </li>

                            <!-- Sous-menu Inspection -->
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#">Inspection</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item"
                                            href="{{ route('inspection.etablissement') }}">Établissements</a></li>
                                    <li><a class="dropdown-item" href="{{ route('inspection.GMP') }}">Inspection
                                            GMP</a></li>
                                    <li><a class="dropdown-item" href="{{ route('inspection.GDP') }}">Inspection
                                            GDP</a></li>
                                </ul>
                            </li>

                        </ul>
                    </li>

                    <!-- Labo -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" data-bs-toggle="dropdown">
                            Labo Contrôle Qualité
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('labocontrol.servicelabo') }}">Service
                                    Laboratoire</a></li>
                            <li><a class="dropdown-item" href="{{ route('labocontrol.aboutlabo') }}">À propos du
                                    labo</a></li>
                        </ul>
                    </li>

                    <!-- Services en ligne -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" data-bs-toggle="dropdown">
                            Services en ligne
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('service.colis.store') }}">Inspection des colis</a>
                            </li>
                        </ul>
                    </li>

                    <!-- Info Publication -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" data-bs-toggle="dropdown">
                            Information & Publication
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('avis') }}">Avis au public</a></li>
                            <li><a class="dropdown-item" href="{{ route('publication') }}">Communiqués</a></li>
                        </ul>
                    </li>

                </ul>

                <!-- Search (style template) -->
                <form class="d-flex" role="search">
                    <div class="search"
                        style="display:flex;border-radius:999px;overflow:hidden;background:rgba(255,255,255,0.08);">
                        <input type="search" placeholder="Rechercher..." class="text-white"
                            style="border:0;background:transparent;padding:6px 10px;outline:none;">
                        <button style="background:transparent;border:0;color:white;padding:6px 10px;">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </nav>
    <div class="container mt-4">
        @yield('content')
    </div>

    <footer>
        <div class="container footer-grid">
            <div>
                <h4>GÉNÉRAL PROCURATURA</h4>
                <p style="margin-top:6px;color:rgba(255,255,255,0.9)">&copy; 2025 Tous droits réservés.</p>
            </div>
            <div>
                <h4>À Propos</h4>
                <a href="#">Structure</a><br>
                <a href="#">Historique</a><br>
                <a href="#">Carrières</a>
            </div>
            <div>
                <h4>Documents</h4>
                <a href="#">Lois</a><br>
                <a href="#">Règlements</a><br>
                <a href="#">Appels d'offres</a>
            </div>
            <div>
                <h4>Recherche &amp; Langue</h4>
                <div style="margin-bottom:8px">
                    <input placeholder="Recherche rapide" style="padding:8px;border-radius:8px;border:0;width:70%">
                    <button style="padding:8px;border-radius:8px;border:0;margin-left:6px">OK</button>
                </div>
                <div style="opacity:.9">FR | EN | ES</div>
            </div>
        </div>
    </footer>
    <script src="{{ asset('js/user.js') }}"></script>
    <script src="{{ asset('js/servicemodal.js') }}"></script>
    @stack('scripts')

    <script src= "js/user.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
