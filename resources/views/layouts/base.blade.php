<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')ABREMA</title>
    <link rel="stylesheet" href="{{ asset('css/mainstyle.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=DM+Serif+Display:ital@0;1&display=swap"
        rel="stylesheet">
    @yield('styles')
</head>

<body>
    <!-- HEADER LOGO -->
    <header class="header">
        <div class="container-fluid">
            <div class="header-content">
                <a href="{{ route('home') }}" class="logo-link">
                    <img src="/images/ABREMA_LOGO.png" alt="Logo ABREMA" class="logo-img">
                    <div class="logo-text">
                        <h1>Autorité Burundaise de Régulation des Médicaments et des Aliments</h1>
                    </div>
                </a>
                <div class="header-actions">
                    <button class="search-btn" id="openSearch" aria-label="Rechercher">
                        <i class="fas fa-search"></i>
                    </button>
                    <button class="mobile-menu-toggle" id="mobileMenuToggle" aria-label="Menu">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
            </div>
        </div>

        <!-- MODAL RECHERCHE -->
        <div id="searchModal" class="search-modal">
            <div class="search-modal-content">
                <button class="close-search" id="closeSearch" aria-label="Fermer">
                    <i class="fas fa-times"></i>
                </button>

                <form action="{{ route('search') }}" method="GET">
                    <div class="search-box">
                        <i class="fas fa-search search-icon"></i>
                        <input type="text" name="q" placeholder="Recherche......" class="search-input"
                            id="searchInput" autocomplete="off" autofocus>
                        <button type="submit" class="search-submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>

                <!-- Suggestions (optionnel) -->
                <div class="search-suggestions">
                    <p>Suggestions populaires :</p>
                    <div class="suggestion-tags">
                        <span class="suggestion-tag">Enregistrement</span>
                        <span class="suggestion-tag">Importation</span>
                        <span class="suggestion-tag">Inspection</span>
                        <span class="suggestion-tag">Vigilance</span>
                        <span class="suggestion-tag">Laboratoire</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- NAVBAR -->
    <nav class="navbar" id="mainNav">
        <div class="">
            <ul class="nav-menu" id="navMenu">
                <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Accueil</a>
                </li>

                <!-- À PROPOS -->
                <li class="dropdown">
                    <a href="#">À propos <i class="fas fa-chevron-down"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('about.profilabrema') }}">Profil de l'ABREMA</a></li>
                        <li><a href="{{ route('about.organigramme') }}">Organigramme</a></li>
                        <li><a href="{{ route('about.equipe') }}">Équipe de Direction</a></li>
                        <li><a href="{{ route('about.fonction') }}">Fonction Réglementaire</a></li>
                        <li><a href="{{ route('about.qms') }}">QMS</a></li>
                    </ul>
                </li>

                <!-- MÉDICAMENTS -->
                <li class="dropdown">
                    <a href="#">Médicaments <i class="fas fa-chevron-down"></i></a>
                    <ul class="dropdown-menu">
                        <li class="has-submenu">
                            <a href="#">Enregistrement / Homologation <i class="fas fa-chevron-right"></i></a>
                            <ul class="dropdown-submenu">
                                <li><a href="{{ route('medicament.produits') }}">Enregistrement</a></li>
                                <li><a href="{{ route('medicament.notifications') }}">Listes des Notifications</a></li>
                                <li><a href="{{ route('medicament.textemedicament') }}">Textes Réglementaires</a></li>
                                <li><a href="{{ route('medicament.listemedicament') }}">Liste Nationale des Médicaments
                                        Essentiels</a></li>
                            </ul>
                        </li>
                        <li class="has-submenu">
                            <a href="#">Import & Export <i class="fas fa-chevron-right"></i></a>
                            <ul class="dropdown-submenu">
                                <li><a href="{{ route('importexport.demande') }}">Demande d'importation</a></li>
                                <li><a href="{{ route('importexport.texteimport') }}">Textes Réglementaires</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-submenu">
                            <a href="#">Inspection <i class="fas fa-chevron-right"></i></a>
                            <ul class="dropdown-submenu">
                                <li><a href="{{ route('inspection.etablissement') }}">Établissements</a></li>
                                <li><a href="{{ route('inspection.GMP') }}">Inspection GMP</a></li>
                                <li><a href="{{ route('inspection.GDP') }}">Inspection GDP</a></li>
                            </ul>
                        </li>
                        <li class="has-submenu">
                            <a href="#">Vigilance & Publicité <i class="fas fa-chevron-right"></i></a>
                            <ul class="dropdown-submenu">
                                <li><a href="{{ route('vigilance.notificationES') }}">Notifications / ES</a></li>
                                <li><a href="{{ route('vigilance.signalement') }}">Signalement / PMQIF</a></li>
                                <li><a href="{{ route('vigilance.delegue') }}">Délégués Médicaux</a></li>
                                <li><a href="{{ route('vigilance.rappel') }}">Rappel de produit</a></li>
                                <li><a href="{{ route('vigilance.textevigilance') }}">Textes Réglementaires</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <!-- LABORATOIRE -->
                <li class="dropdown">
                    <a href="#">Labo Contrôle Qualité <i class="fas fa-chevron-down"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('labocontrol.servicelabo') }}">Service Laboratoire</a></li>
                        <li><a href="{{ route('labocontrol.aboutlabo') }}">À propos du Labo</a></li>
                    </ul>
                </li>

                <!-- SERVICES EN LIGNE -->
                <li class="dropdown">
                    <a href="#">Services en Ligne <i class="fas fa-chevron-down"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('submitcolis') }}">Inspection des colis</a></li>
                    </ul>
                </li>

                <!-- INFORMATION -->
                <li class="dropdown">
                    <a href="#">Information et Publication <i class="fas fa-chevron-down"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('information.evenement') }}">Événements</a></li>
                        <li><a href="{{ route('information.actualite') }}">Actualités</a></li>
                        <li><a href="{{ route('information.document') }}">Autres Documents</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

    <!-- CONTENU PRINCIPAL -->
    @yield('content')

    <!-- FOOTER -->
    <footer class="footer">
        <div class="footer-main">
            <div class="container-fluid">
                <div class="footer-grid">
                    <div class="footer-col">
                        <div class="footer-logo">
                            <img src="{{ asset('assets/images/logo.png') }}" alt="Logo ABREMA">
                            <h3>ABREMA</h3>
                        </div>
                        <p>Autorité Burundaise de Régulation des Médicaments à usage humain et des Aliments</p>
                        <div class="footer-social">
                            <a href="https://www.facebook.com/profile.php?id=61576348075548" aria-label="Facebook"><i
                                    class="fab fa-facebook"></i></a>
                            <a href="https://www.youtube.com/@Abrema-Burundi" aria-label="YouTube"><i
                                    class="fab fa-youtube"></i></a>
                            <a href="https://x.com/Abrema_Burundi" aria-label="Twitter"><i
                                    class="fab fa-twitter"></i></a>
                            <a href="https://www.linkedin.com/in/abrema" aria-label="LinkedIn"><i
                                    class="fab fa-linkedin"></i></a>
                            <a href="https://www.instagram.com/abrema_burundi/" aria-label="Instagram"><i
                                    class="fab fa-instagram"></i></a>
                        </div>
                    </div>

                    <div class="footer-col">
                        <h4>Liens Rapides</h4>
                        <ul class="footer-links">
                            <li><a href="{{ route('home') }}">Accueil</a></li>
                            <li><a href="{{ route('about.profilabrema') }}">Profil global d'Abrema</a></li>
                            <li><a href="{{ route('medicament.produits') }}">Liste des medicaments</a></li>
                            <li><a href="{{ route('labocontrol.servicelabo') }}">A propos de laboratoire</a></li>
                            <li><a href="{{ route('about.equipe') }}">Equipe de direction</a></li>
                        </ul>
                    </div>

                    <div class="footer-col">
                        <h4>Liens Importants</h4>
                        <ul class="footer-links">
                            <li><a href="https://presidence.gov.bi/" target="_blank">Présidence de la République</a>
                            </li>
                            <li><a href="https://www.minsante.gov.bi/" target="_blank">Ministre de la Santé Publique
                                    Publique</a></li>
                            <li><a href="https://finances.gov.bi/" target="_blank">Ministère des Finances , du Budget
                                    et de l'Economie Numérique</a></li>
                            <li><a href="https://camebu.net/" target="_blank">CAMEBU</a></li>
                        </ul>
                    </div>

                    <div class="footer-col">
                        <h4>Contact</h4>
                        <ul class="footer-contact">
                            <li>
                                <i class="fas fa-map-marker-alt"></i>
                                <span>Avenue de l'industrie, No 12, BUJUMBURA</span>
                            </li>
                            <li>
                                <i class="fas fa-phone"></i>
                                <span>+257 22 22 97 39</span>
                            </li>
                            <li>
                                <i class="fas fa-phone"></i>
                                <span>Numéro vert : 203</span>
                            </li>
                            <li>
                                <i class="fas fa-envelope"></i>
                                <span><a href="mailto:info@abrema.gov.bi">info@abrema.gov.bi</a></span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom ">
            <div class="container-fluid">
                <div class="footer-bottom-content text-center">
                    <p class="text-white bg-danger">Copyright © {{ date('Y') }} Autorité Burundaise de Régulation
                        des Médicaments à usage humain et des Aliments - All rights reserved</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- SCROLL TO TOP -->
    <button class="scroll-top" id="scrollTop" aria-label="Retour en haut">
        <i class="fas fa-arrow-up"></i>
    </button>

    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')
</body>

</html>
