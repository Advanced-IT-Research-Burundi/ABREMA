@extends('layouts.base')

@section('title', 'Profil de l\'ABREMA')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/pages.css') }}">
@endsection

@section('content')
<!-- PAGE BANNER -->
<div class="page-banner">
    <div class="container-fluid">
        <h1>Service Laboratoire</h1>
        <p class="lead">Autorité Burundaise de Régulation des Médicaments à usage humain et des Aliments</p>
    </div>
</div>

<!-- MAIN LAYOUT -->
<div class="main-layout">
    <div class="container-fluid">
        <div class="layout-row">
            
            <!-- SIDEBAR NAV -->
            <aside class="sidebar-nav">
                <h3>Navigation</h3>
                <nav class="nav flex-column">
                    <a class="nav-link active" href="{{ route('about.profilabrema') }}">Profil global d'ABREMA</a>
                    <a class="nav-link" href="{{ route('about.organigramme') }}">Organigramme</a>
                    <a class="nav-link" href="{{ route('about.equipe') }}">Équipe de Direction</a>
                    <a class="nav-link" href="{{ route('about.fonction') }}">Fonction Réglementaire</a>
                    <a class="nav-link" href="{{ route('about.qms') }}">QMS</a>
                </nav>
            </aside>

            <!-- MAIN CONTENT -->
            <main class="main-content">
                <h2>À propos de l'ABREMA</h2>
@extends('layouts.base')

@section('title', 'Profil de l\'ABREMA')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/pages.css') }}">
@endsection

@section('content')
<!-- PAGE BANNER -->
<div class="page-banner">
    <div class="container-fluid">
        <h1>À propos de l'ABREMA</h1>
        <p class="lead">Autorité Burundaise de Régulation des Médicaments à usage humain et des Aliments</p>
    </div>
</div>

<!-- MAIN LAYOUT -->
<div class="main-layout">
    <div class="container-fluid">
        <div class="layout-row">
            
            <!-- SIDEBAR NAV -->
            <aside class="sidebar-nav">
                <h3>Navigation</h3>
                <nav class="nav flex-column">
                    <a class="nav-link active" href="{{ route('about.profilabrema') }}">Profil global d'ABREMA</a>
                    <a class="nav-link" href="{{ route('about.organigramme') }}">Organigramme</a>
                    <a class="nav-link" href="{{ route('about.equipe') }}">Équipe de Direction</a>
                    <a class="nav-link" href="{{ route('about.fonction') }}">Fonction Réglementaire</a>
                    <a class="nav-link" href="{{ route('about.qms') }}">QMS</a>
                </nav>
            </aside>

            <!-- MAIN CONTENT -->
            <main class="main-content">
                <h2>Service Laboratoire</h2>
                    <div class="page-section">
        <h1 class="page-title">Service Laboratoire</h1>

        <p class="page-text">
            L’accès pour tous à des médicaments et autres produits réglementés de bonne qualité,
            sûrs et efficaces contribue de manière très significative à l’accès à la santé qui est
            l’un des objectifs de développement durable. Les produits de santé de qualité inférieure
            ou falsifiés constituent une menace pour la santé publique mondiale et posent un problème
            particulièrement sérieux dans les pays à revenu faible ou intermédiaire.
        </p>

        <p class="page-text">
            C’est dans cette optique que l’ABREMA a été mis en place comme une agence de régulation des produits
            réglementés comportant une Direction des services de laboratoire et de régulation de contrôle de la
            qualité des aliments.
        </p>

        <p class="page-text">
            Cette Direction est chargée de contrôler l’application des normes de qualité, superviser et coordonner
            les activités de contrôle de qualité des médicaments à usage humain, des médicaments traditionnels, des
            produits cosmétiques et diététiques contenant un principe actif ; réglementer toutes les activités relatives
            à la qualité et l’innocuité des aliments préfabriqués et emballés sur toute la chaîne depuis la production
            jusqu’à leur consommation.
        </p>
    </div>

    <!-- <div class="page-section">
        <img src="{{ asset('images/service_labo.jpg') }}" alt="Images de service labo" class="page-img">
    </div> -->

            </main>

            <!-- SIDEBAR WIDGETS -->
            <aside>
                <!-- Avis au public -->
                <div class="widget">
                    <h3>Avis au Public</h3>
                    <p class="text-muted small">Pas d'avis au Public pour le moment</p>
                </div>

                <!-- Services rapides -->
                <div class="widget widget-services">
                    <h3>Services Rapides</h3>
                    <a href="{{ route('importexport.demande') }}" class="service-link">
                        <span>Demande d'importation</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                    <a href="{{ route('colis.index') }}" class="service-link">
                        <span>Inspection des colis</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                    <a href="{{ route('vigilance.signalement') }}" class="service-link">
                        <span>Signalement PMQIF</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                    <a href="{{ route('vigilance.delegue') }}" class="service-link">
                        <span>Délégués médicaux</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

                <!-- Liens officiels -->
                <div class="widget widget-links">
                    <h3>Points D'Entrees</h3>
                    <a href="#">Aéroport international Melchior Ndadaye</a>
                    <a href="#">Port de Bujumbura</a>
                    <a href="#">Frontière de Kobero</a>
                    <a href="#">Frontière de Kanyaru haut</a>
                    <a href="#">Frontière Gasenyi Nemba</a>
                    <a href="#">Frontière Gatumba</a>
                </div>
            </aside>

        </div>
    </div>
</div>
@endsection
            </main>

            <!-- SIDEBAR WIDGETS -->
            <aside>
                <!-- Avis au public -->
                <div class="widget">
                    <h3>Avis au Public</h3>
                    <p class="text-muted small">Pas d'avis au Public pour le moment</p>
                </div>

                <!-- Services rapides -->
                <div class="widget widget-services">
                    <h3>Services Rapides</h3>
                    <a href="{{ route('importexport.demande') }}" class="service-link">
                        <span>Demande d'importation</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                    <a href="{{ route('colis.index') }}" class="service-link">
                        <span>Inspection des colis</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                    <a href="{{ route('vigilance.signalement') }}" class="service-link">
                        <span>Signalement PMQIF</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                    <a href="{{ route('vigilance.delegue') }}" class="service-link">
                        <span>Délégués médicaux</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

                <!-- Liens officiels -->
                <div class="widget widget-links">
                    <h3>Points D'Entrees</h3>
                    <a href="#">Aéroport international Melchior Ndadaye</a>
                    <a href="#">Port de Bujumbura</a>
                    <a href="#">Frontière de Kobero</a>
                    <a href="#">Frontière de Kanyaru haut</a>
                    <a href="#">Frontière Gasenyi Nemba</a>
                    <a href="#">Frontière Gatumba</a>
                </div>
            </aside>

        </div>
    </div>
</div>
@endsection