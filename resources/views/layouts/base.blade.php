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
        
    <nav class="navbar">
            <div class="container">
                <div class="nav-wrapper">
                    <div class="logo">
                        <img src="{{asset('images/logo.png')}}" alt="Logo ABREMA">
                        <div class="logo-text">
                            <h1>ABREMA</h1>
                            <p>Autorité Burundaise de Régulation</p>
                        </div>
                    </div>

                    <button class="mobile-menu-toggle" aria-label="Menu">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>

                    <ul class="nav-menu">
                        <li><a href="{{route('home')}}" class="active">Accueil</a></li>
                        <li class="dropdown">
                            <a href="{{ route('about.profilabrema') }}">À propos <i class="fas fa-chevron-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('about.profilabrema') }}">Profil de l'ABREMA</a></li>
                                <li><a href="{{ route('about.organigramme') }}">Organigramme</a></li>
                                <li><a href="{{ route('about.equipe') }}">Équipe de Direction</a></li>
                                <li><a href="{{ route('about.fonction') }}">Fonction Réglementaire</a></li>
                                <li><a href="{{ route('about.qms') }}">QMS</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
    <a href="#medicaments">Médicaments <i class="fas fa-chevron-down"></i></a>

    <ul class="dropdown-menu">
        <li class="has-submenu">
            <a href="#enregistrement">Enregistrement/Homologation</a>

            <ul class="dropdown-menu-secondary">
                <li><a href="#">Enregistrement</a></li>
                <li><a href="#">Homologation</a></li>
                <li><a href="#">Homologation</a></li>
            </ul>
        </li>

        <li class="has-submenu"><a href="#importation">Autorisation d'importation</a>
        <ul class="dropdown-menu-secondary">
                <li><a href="#">Demande d'importation</a></li>
                <li><a href="#">Textes Reglementaires</a></li>
                <li><a href="#">Les points d'entrées</a></li>
            </ul>
        </li>
        <li><a href="#surveillance">Surveillance du marché</a></li>
    </ul>
</li>
                        <li class="dropdown">
                            <a href="#laboratoire">Labo Contrôle Qualité <i class="fas fa-chevron-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="#analyses">Services d'analyses</a></li>
                                <li><a href="#minilab">Kits Minilab</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#services">Services en Ligne <i class="fas fa-chevron-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="#asycuda">ASYCUDA</a></li>
                                <li><a href="#rims">ABREMA-RIMS</a></li>
                            </ul>
                        </li>
                        <li><a href="#publications">Information et Publication</a></li>
                    </ul>

                    <button class="search-btn" aria-label="Rechercher">
                        <i class="fas fa-search"></i>
                    </button>
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
