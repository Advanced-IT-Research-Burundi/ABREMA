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
                    <span><i class="fas fa-phone"></i> +257 22 24 XX XX</span>
                    <span><i class="fas fa-envelope"></i> <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="d8bbb7b6acb9bbac98b9baaabdb5b9f6bfb7aef6bab1">[email&#160;protected]</a></span>
                </div>
                <div class="social-links">
                    <a href="#" aria-label="Facebook"><i class="fab fa-facebook"></i></a>
                    <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin"></i></a>
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
                        <li><a href="#accueil" class="active">Accueil</a></li>
                        <li class="dropdown">
                            <a href="#apropos">À propos <i class="fas fa-chevron-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="#profil">Profil de l'ABREMA</a></li>
                                <li><a href="#organigramme">Organigramme</a></li>
                                <li><a href="#direction">Équipe de Direction</a></li>
                                <li><a href="#fonction">Fonction Réglementaire</a></li>
                                <li><a href="#qms">QMS</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#medicaments">Médicaments <i class="fas fa-chevron-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="#enregistrement">Enregistrement/Homologation</a></li>
                                <li><a href="#importation">Autorisation d'importation</a></li>
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
                            <a href="#" aria-label="Facebook"><i class="fab fa-facebook"></i></a>
                            <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                            <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin"></i></a>
                            <a href="#" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
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
                        <h4>Services</h4>
                        <ul class="footer-links">
                            <li><a href="#enregistrement">Enregistrement</a></li>
                            <li><a href="#importation">Autorisation d'importation</a></li>
                            <li><a href="#asycuda">ASYCUDA</a></li>
                            <li><a href="#rims">ABREMA-RIMS</a></li>
                            <li><a href="#qms">Système Qualité</a></li>
                        </ul>
                    </div>

                    <div class="footer-col">
                        <h4>Contact</h4>
                        <ul class="footer-contact">
                            <li>
                                <i class="fas fa-map-marker-alt"></i>
                                <span>Bujumbura, Burundi</span>
                            </li>
                            <li>
                                <i class="fas fa-phone"></i>
                                <span>+257 22 24 XX XX</span>
                            </li>
                            <li>
                                <i class="fas fa-envelope"></i>
                                <span><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="b6d5d9d8c2d7d5c2f6d7d4c4d3dbd798d1d9c098d4df">[email&#160;protected]</a></span>
                            </li>
                            <li>
                                <i class="fas fa-clock"></i>
                                <span>Lun - Ven: 8h00 - 17h00</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">
                <div class="footer-bottom-content">
                    <p>&copy; 2024 ABREMA - Tous droits réservés</p>
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
