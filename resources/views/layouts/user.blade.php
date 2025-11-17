<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABREMA</title>
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <header>
        <a href="{{ route('home') }}">Welcome To Abrema</a>
    </header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">

            <a class="navbar-brand" href="{{ route('home') }}">ABREMA</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarMain">
                <ul class="navbar-nav me-auto">

                    <!-- Accueil -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Accueil</a>
                    </li>

                    <!-- À propos -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            À propos
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('about.profilabrema') }}">Profile de
                                    l'ABREMA</a></li>
                            <li><a class="dropdown-item" href="{{ route('about.organigramme') }}">Organigramme</a></li>
                            <li><a class="dropdown-item" href="{{ route('about.equipe') }}">Équipe de direction</a></li>
                            <li><a class="dropdown-item" href="{{ route('about.fonction') }}">Fonction réglementaire</a>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('about.qms') }}">QMS</a></li>
                        </ul>
                    </li>

                    <!-- Médicaments -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            Médicaments
                        </a>
                        <ul class="dropdown-menu">

                            <!-- Sous-menu Enregistrement -->
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#">Enregistrement</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('medicament.produits') }}">Produits
                                            enregistrés</a></li>
                                    <li><a class="dropdown-item" href="{{ route('medicament.notification') }}">Liste de
                                            notification</a></li>
                                    <li><a class="dropdown-item"
                                            href="{{ route('medicament.textemedicament') }}">Textes réglementaires</a>
                                    </li>
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
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            Labo Contrôle Qualité
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('labocontrol.servicelabo') }}">Service
                                    Laboratoire</a></li>
                            <li><a class="dropdown-item" href="{{ route('labocontrol.aboutlabo') }}">À propos du
                                    laboratoire</a></li>
                        </ul>
                    </li>

                    <!-- Services en ligne -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            Services en ligne
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('service.colis') }}">Inspection des colis</a>
                            </li>
                        </ul>
                    </li>

                    <!-- Info -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            Information & Publication
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('avis') }}">Avis au public</a></li>
                            <li><a class="dropdown-item" href="{{ route('publication') }}">Communiqués</a></li>
                        </ul>
                    </li>

                </ul>
            </div>

        </div>
    </nav>
    <div class="container mt-4">
        @yield('content')
    </div>

    <footer class="footer">
        <div class="footer-main">
            <div class="container">
                <div class="footer-grid">
                    <div class="footer-column">
                        <div class="footer-logo">
                            <img src="{{ asset('assets/images/logo.png') }}" alt="">
                            <div>
                                <h3>ABREMA</h3>
                                <p>Autorité Burundaise de Régulation des Médicaments à usage humain et des Aliments</p>
                            </div>
                        </div>
                        <p class="footer-desc">Passsionne par votre satisfaction par une personne experimente.Transport
                            de vos marchandise par la voie maritime et aerienne de la CHINE au BURUNDI</p>
                    </div>

                    <div class="footer-column">
                        <h4>Liens Rapides</h4>
                        <ul class="footer-links">
                            <li><a href="{{ route('home') }}"><i class="fas fa-angle-right"></i> HOME</a></li>
                            <li><a href="{{ route('about.profilabrema') }}"><i class="fas fa-angle-right"></i>
                                    ABOUT</a></li>
                            <li><a href="{{ route('service.colis') }}"><i class="fas fa-angle-right"></i>
                                    SERVICES</a></li>
                            <li><a href="{{ route('publication') }}"><i class="fas fa-angle-right"></i>
                                    ACTUALITES</a>
                            </li>
                            <li><a href="{{ route('avis') }}"><i class="fas fa-angle-right"></i> CONTACT</a></li>
                        </ul>
                    </div>

                    <div class="footer-column">
                        <h4>Nos Services</h4>
                        <ul class="footer-links">
                            <li><a href="#">Transport CHINE-BURUNDI</a></li>
                            <li><a href="#">Importation et Exportation</a></li>
                            <li><a href="#">Dedouanement</a></li>
                            <li><a href="#">Paiement des fournisseurs en
                                    chine</a></li>
                            <li><a href="#">Services des visas</a></li>
                            <li><a href="#">Les billets d'avion</a></li>
                        </ul>
                    </div>

                    <div class="footer-column">
                        <h4>Contactez-nous</h4>

                        <div class="footer-contact-info">
                            <p><i class="fa-solid fa-location-dot"></i> Bujumbura mairie, Rohero 1
                                Avenue de Croix Rouge Numéro 2 </p>
                            <p><i class="fas fa-phone"></i> (+257) 65 150 000/ 65 210 000</p>
                            <p><i class="fas fa-envelope"></i> abrema@gmail.com</p>
                        </div>
                        <p>Suivez-nous sur les liens ci-dessous</p>
                        <div class="footer-social">
                            {{-- <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a> --}}
                            <a href="https://www.instagram.com/abrema/"><i class="fab fa-instagram"></i></a>
                            {{-- <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-youtube"></i></a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">
                <p>&copy; 2025 ABREMA BURUNDI. Tous droits réservés. | Développé par
                    <a target="_blank" href="https://advancedit.bi">Advanced IT Burundi</a>
                </p>
            </div>
        </div>
    </footer>
    <script src="{{ asset('js/user.js') }}"></script>
    <script src="{{ asset('js/servicemodal.js') }}"></script>
    @stack('scripts')


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
