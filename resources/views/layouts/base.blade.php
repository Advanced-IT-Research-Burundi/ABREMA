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

    <!-- Image Gallery Slider -->
    <section class="gallery-slider main-slider">
        <div class="slider-container-full">
            <div class="slider-wrapper">
                <div class="slide active">
                    <img src="https://images.unsplash.com/photo-1631549916768-4119b2e5f926?w=1920&h=700&fit=crop" alt="Laboratoire ABREMA 1">
                    <div class="slide-overlay"></div>
                    <div class="slide-caption">
                        <div class="container">
                            <h2>Bienvenu chez ABREMA</h2>
                            <p>L'Autorité Burundaise de Régulation des Médicaments à usage humain et des Aliments « ABREMA » en sigle, est une administration personnalisée de l'État placée sous la tutelle du ministère ayant la santé publique dans ses attributions.</p>
                        </div>
                    </div>
                </div>

                <div class="slide">
                    <img src="https://images.unsplash.com/photo-1582719471137-c3967ffb1c42?w=1920&h=700&fit=crop" alt="Analyse en laboratoire">
                    <div class="slide-overlay"></div>
                    <div class="slide-caption">
                        <div class="container">
                            <h2>Laboratoire de Contrôle Qualité</h2>
                            <p>Équipements modernes et personnel qualifié pour garantir la qualité des médicaments et protéger la santé publique au Burundi.</p>
                        </div>
                    </div>
                </div>

                <div class="slide">
                    <img src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?w=1920&h=700&fit=crop" alt="Médicaments contrôlés">
                    <div class="slide-overlay"></div>
                    <div class="slide-caption">
                        <div class="container">
                            <h2>Médicaments Homologués</h2>
                            <p>Processus d'évaluation rigoureux basé sur la qualité, l'innocuité et l'efficacité selon les normes OMS, ICH et EAC.</p>
                        </div>
                    </div>
                </div>

                <div class="slide">
                    <img src="https://images.unsplash.com/photo-1587854692152-cbe660dbde88?w=1920&h=700&fit=crop" alt="Équipe ABREMA">
                    <div class="slide-overlay"></div>
                    <div class="slide-caption">
                        <div class="container">
                            <h2>Notre Équipe d'Experts</h2>
                            <p>Des professionnels dévoués et qualifiés au service de la réglementation pharmaceutique et de la santé publique.</p>
                        </div>
                    </div>
                </div>

                <div class="slide">
                    <img src="https://images.unsplash.com/photo-1579684385127-1ef15d508118?w=1920&h=700&fit=crop" alt="Formation ABREMA">
                    <div class="slide-overlay"></div>
                    <div class="slide-caption">
                        <div class="container">
                            <h2>Formation Continue</h2>
                            <p>Sessions de formation régulières pour maintenir l'excellence et se conformer aux meilleures pratiques internationales.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Navigation Controls -->
            <button class="slider-btn prev-btn" aria-label="Image précédente">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button class="slider-btn next-btn" aria-label="Image suivante">
                <i class="fas fa-chevron-right"></i>
            </button>

            <!-- Dots Indicators -->
            <div class="slider-dots">
                <span class="dot active" data-slide="0"></span>
                <span class="dot" data-slide="1"></span>
                <span class="dot" data-slide="2"></span>
                <span class="dot" data-slide="3"></span>
                <span class="dot" data-slide="4"></span>
            </div>
        </div>
    </section>

    <!-- Hero Section (Removed - replaced by slider) -->
    <section class="hero" style="display: none;">
        <div class="hero-slider">
            <div class="hero-slide active">
                <div class="hero-overlay"></div>
                <div class="hero-content">
                    <div class="container">
                        <h2 class="hero-title animate-fade-in">Bienvenu chez ABREMA</h2>
                        <p class="hero-subtitle animate-fade-in-delay">L'Autorité Burundaise de Régulation des Médicaments à usage humain et des Aliments « ABREMA » en sigle, est une institution étatique placée sous la tutelle du ministère ayant la santé publique dans ses attributions.</p>
                        <div class="hero-buttons animate-fade-in-delay-2">
                            <a href="#services" class="btn btn-primary">Nos Services</a>
                            <a href="#apropos" class="btn btn-secondary">En savoir plus</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Vision Mission Section -->
    <section class="vision-mission">
        <div class="container">
            <div class="vm-grid">
                <div class="vm-card">
                    <div class="vm-icon">
                        <i class="fas fa-eye"></i>
                    </div>
                    <h3>Vision</h3>
                    <p>La vision de l'ABREMA est d'atteindre le niveau de maturité élevé de qualité de ses services, le maintenir et l'améliorer de façon continue.</p>
                </div>

                <div class="vm-card">
                    <div class="vm-icon">
                        <i class="fas fa-bullseye"></i>
                    </div>
                    <h3>Mission</h3>
                    <p>Promouvoir et protéger la santé publique en s'assurant que les produits de santé disponibles sont de bonne qualité, sûrs et efficaces.</p>
                </div>

                <div class="vm-card">
                    <div class="vm-icon">
                        <i class="fas fa-award"></i>
                    </div>
                    <h3>Valeurs</h3>
                    <p>Excellence, Intégrité, Transparence, Innovation et Collaboration pour garantir la sécurité sanitaire du Burundi.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="services" id="services">
        <div class="container">
            <div class="section-header">
                <h2>Nos Services</h2>
                <p>ABREMA offre des services rapides et de qualité dans la réglementation des produits de santé</p>
            </div>

            <div class="services-grid">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-file-medical"></i>
                    </div>
                    <h3>Enregistrement/Homologation</h3>
                    <p>Processus d'évaluation scientifique et objective d'un dossier de demande d'Autorisation de Mise sur le Marché (AMM) basé sur la qualité, l'innocuité et l'efficacité.</p>
                    <a href="#enregistrement" class="service-link">En savoir plus <i class="fas fa-arrow-right"></i></a>
                </div>

                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-laptop"></i>
                    </div>
                    <h3>Service en ligne</h3>
                    <p>Digitalisation des services avec le Guichet Unique Électronique « ASYCUDA » et le nouveau système « ABREMA-RIMS » en cours de finalisation.</p>
                    <a href="#services" class="service-link">En savoir plus <i class="fas fa-arrow-right"></i></a>
                </div>

                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-flask"></i>
                    </div>
                    <h3>Laboratoire de contrôle qualité</h3>
                    <p>Réalisation des activités de contrôle qualité avec des Kits Minilab pour détecter rapidement les médicaments falsifiés ou de qualité inférieure.</p>
                    <a href="#laboratoire" class="service-link">En savoir plus <i class="fas fa-arrow-right"></i></a>
                </div>

                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-certificate"></i>
                    </div>
                    <h3>Politique qualité</h3>
                    <p>Système de Management de la Qualité (SMQ) conforme aux normes ISO 9000, ISO 9001, ISO 9004 et ISO 26000.</p>
                    <a href="#qms" class="service-link">En savoir plus <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us -->
    <section class="why-choose-us">
        <div class="container">
            <div class="why-content">
                <div class="why-text">
                    <h2>Pourquoi travailler avec nous !</h2>
                    <p>ABREMA est une institution offrant de services rapides et de qualité dans la réglementation des produits de santé pour protéger la santé publique en garantissant la qualité, l'efficacité et l'innocuité des produits réglementés en se référant aux normes de l'OMS, l'UA et de l'EAC.</p>

                    <ul class="why-list">
                        <li><i class="fas fa-check-circle"></i> Conformité aux normes internationales OMS, ICH, EAC</li>
                        <li><i class="fas fa-check-circle"></i> Processus d'évaluation rigoureux et transparent</li>
                        <li><i class="fas fa-check-circle"></i> Services digitalisés et accessibles</li>
                        <li><i class="fas fa-check-circle"></i> Équipe d'experts qualifiés</li>
                        <li><i class="fas fa-check-circle"></i> Laboratoire de contrôle qualité certifié</li>
                    </ul>

                    <a href="#contact" class="btn btn-primary">Contactez-nous</a>
                </div>

                <div class="why-image">
                    <img src="https://images.unsplash.com/photo-1582719471137-c3967ffb1c42?w=800&h=600&fit=crop" alt="Laboratoire ABREMA">
                </div>
            </div>
        </div>
    </section>

    <!-- Clients Section -->
    <section class="clients">
        <div class="container">
            <div class="section-header">
                <h2>Nos Clients</h2>
                <p>Nous servons divers acteurs du secteur de la santé au Burundi</p>
            </div>

            <div class="clients-grid">
                <div class="client-item">
                    <i class="fas fa-industry"></i>
                    <p>Industries pharmaceutiques</p>
                </div>
                <div class="client-item">
                    <i class="fas fa-prescription-bottle-alt"></i>
                    <p>Pharmacies grossistes privées</p>
                </div>
                <div class="client-item">
                    <i class="fas fa-chart-line"></i>
                    <p>Agences de promotion</p>
                </div>
                <div class="client-item">
                    <i class="fas fa-shopping-cart"></i>
                    <p>Centrale d'Achat</p>
                </div>
                <div class="client-item">
                    <i class="fas fa-hands-helping"></i>
                    <p>ONG nationales et internationales</p>
                </div>
                <div class="client-item">
                    <i class="fas fa-hospital"></i>
                    <p>Districts et hôpitaux publics et privés</p>
                </div>
                <div class="client-item">
                    <i class="fas fa-landmark"></i>
                    <p>Ministères</p>
                </div>
                <div class="client-item">
                    <i class="fas fa-users"></i>
                    <p>Population burundaise</p>
                </div>
            </div>
        </div>
    </section>

    <!-- News Section -->
    <section class="news">
        <div class="container">
            <div class="section-header">
                <h2>Actualités & Publications</h2>
                <p>Restez informés de nos dernières activités</p>
            </div>

            <div class="news-grid">
                <article class="news-card">
                    <div class="news-image">
                        <img src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?w=600&h=400&fit=crop" alt="Actualité 1">
                        <span class="news-badge">Actualité</span>
                    </div>
                    <div class="news-content">
                        <div class="news-meta">
                            <span><i class="fas fa-calendar"></i> 15 Nov 2024</span>
                            <span><i class="fas fa-tag"></i> Réglementation</span>
                        </div>
                        <h3>Nouvelle réglementation sur l'homologation des médicaments</h3>
                        <p>L'ABREMA annonce la mise en œuvre de nouvelles directives pour l'homologation des produits pharmaceutiques...</p>
                        <a href="#" class="read-more">Lire plus <i class="fas fa-arrow-right"></i></a>
                    </div>
                </article>

                <article class="news-card">
                    <div class="news-image">
                        <img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=600&h=400&fit=crop" alt="Actualité 2">
                        <span class="news-badge">Événement</span>
                    </div>
                    <div class="news-content">
                        <div class="news-meta">
                            <span><i class="fas fa-calendar"></i> 10 Nov 2024</span>
                            <span><i class="fas fa-tag"></i> Formation</span>
                        </div>
                        <h3>Formation sur le système ABREMA-RIMS</h3>
                        <p>Une session de formation sur le nouveau système électronique ABREMA-RIMS sera organisée...</p>
                        <a href="#" class="read-more">Lire plus <i class="fas fa-arrow-right"></i></a>
                    </div>
                </article>

                <article class="news-card">
                    <div class="news-image">
                        <img src="https://images.unsplash.com/photo-1532187863486-abf9dbad1b69?w=600&h=400&fit=crop" alt="Actualité 3">
                        <span class="news-badge">Communiqué</span>
                    </div>
                    <div class="news-content">
                        <div class="news-meta">
                            <span><i class="fas fa-calendar"></i> 5 Nov 2024</span>
                            <span><i class="fas fa-tag"></i> Qualité</span>
                        </div>
                        <h3>Renforcement du contrôle qualité des médicaments</h3>
                        <p>L'ABREMA intensifie ses activités de contrôle qualité pour garantir la sécurité des produits...</p>
                        <a href="#" class="read-more">Lire plus <i class="fas fa-arrow-right"></i></a>
                    </div>
                </article>
            </div>

            <div class="news-cta">
                <a href="#publications" class="btn btn-primary">Voir toutes les actualités</a>
            </div>
        </div>
    </section>

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
