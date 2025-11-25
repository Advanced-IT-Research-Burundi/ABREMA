<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Autorité Burundaise de Régulation des Médicaments à usage humain et des Aliments - ABREMA">
    <title>ABREMA - Autorité Burundaise de Régulation des Médicaments</title>
    <link rel="stylesheet" href="{{asset('css/mainstyle.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="header-top">
            <div class="container">
                <div class="contact-info">
                    <span><i class="fas fa-phone"></i> +257 22 22 97 39</span>
                    <span><i class="fas fa-envelope"></i> <a href="mailto:info@abrema.gov.bi">info@abrema.gov.bi</a></span>
                </div>
                <div class="social-links">
                    <a href="https://www.facebook.com/profile.php?id=61576348075548" aria-label="Facebook"><i class="fab fa-facebook"></i></a>
                    <a href="https://x.com/Abrema_Burundi" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.linkedin.com/in/abrema" aria-label="LinkedIn"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>
        </div>
        
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
                            <li><a class="dropdown-item" href="{{ route('about.equipe') }}">Équipe de direction</a></li>
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
                            <li><a class="dropdown-item" href="{{ route('service.colis') }}">Inspection des colis</a>
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
    </header>

    @yield('content')


    <!-- Footer -->
    <footer class="footer">
        <div class="footer-main">
            <div class="container">
                <div class="footer-grid">
                    <div class="footer-col">
                        <div class="footer-logo">
                            <img src="{{asset('images/logo.png')}}" alt="Logo ABREMA">
                            <h3>ABREMA</h3>
                        </div>
                        <p>Autorité Burundaise de Régulation des Médicaments à usage humain et des Aliments</p>
                        <div class="footer-social">
                            <a href="https://www.facebook.com/profile.php?id=61576348075548" aria-label="Facebook"><i class="fab fa-facebook"></i></a>
                            <a href="https://x.com/Abrema_Burundi" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                            <a href="https://www.linkedin.com/in/abrema" aria-label="LinkedIn"><i class="fab fa-linkedin"></i></a>
                            <a href="https://www.instagram.com/abrema_burundi/" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>

                    <div class="footer-col">
                        <h4>Liens Rapides</h4>
                        <ul class="footer-links">
                            <li><a href="#accueil">Accueil</a></li>
                            <li><a href="#apropos">À propos</a></li>
                            <li><a href="#services">Services</a></li>
                            <li><a href="#laboratoire">Laboratoire</a></li>
                            <li><a href="#publications">Publications</a></li>
                        </ul>
                    </div>

                    <div class="footer-col">
                        <h4>Liens Importants</h4>
                        <ul class="footer-links">
                            <li><a href="https://presidence.gov.bi/">Présidence de la République</a></li>
                            <li><a href="https://www.minsante.gov.bi/">Ministre de la Santé Publique et de la Lutte contre le Sida</a></li>
                            <li><a href="https://finances.gov.bi/">Ministère des Finances , du Budget et de la Planification Economique</a></li>
                            <li><a href="https://camebu.net/">CAMEBU</a></li>
                            
                        </ul>
                    </div>

                    <div class="footer-col">
                        <h4>Contact</h4>
                        <ul class="footer-contact">
                            <li>
                                <i class="fas fa-map-marker-alt"></i>
                                <span>Avenue de l’industrie, No 12, BUJUMBURA</span>
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

        <div class="footer-bottom">
            <div class="container"> 
                <div class="footer-bottom-content">
                    <p>&copy; {{date('Y')}} ABREMA - Tous droits réservés</p>
                    <div class="footer-bottom-links">
                        <a href="#">Mentions légales</a>
                        <a href="#">Politique de confidentialité</a>
                        <a href="#">Plan du site</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    </body>

    <script src="{{asset('js/app.js')}}"></script>
</html>
