@extends('layouts.base')

@section('title', 'Service Laboratoire | ')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/pages.css') }}">
@endsection

@section('content')

    {{-- ── PAGE BANNER ── --}}
    <div class="page-banner">
        <div class="banner-breadcrumb">
            <a href="{{ route('home') }}">Accueil</a>
            <i class="fas fa-chevron-right"></i>
            <span class="current">Service Laboratoire</span>
        </div>
        <h1>Service Laboratoire</h1>
        <p class="lead">Direction des services de laboratoire et de régulation du contrôle de la qualité des aliments</p>
    </div>

    {{-- ── MAIN LAYOUT ── --}}
    <div class="main-layout">
        <div class="container-fluid">
            <div class="layout-row">

                {{-- ══ SIDEBAR ══ --}}
                <aside class="sidebar-nav">

                    <div class="nav-block">
                        <nav>
                            <a class="nav-link {{ Route::is('labocontrol.servicelabo') ? 'active' : '' }}"
                               href="{{ route('labocontrol.servicelabo') }}">
                                <span>Service Laboratoire</span>
                                <span class="nav-arrow"><i class="fas fa-chevron-right"></i></span>
                            </a>
                            <a class="nav-link {{ Route::is('labocontrol.apropos') ? 'active' : '' }}"
                               href="{{ route('labocontrol.apropos') }}">
                                <span>À propos du Laboratoire</span>
                                <span class="nav-arrow"><i class="fas fa-chevron-right"></i></span>
                            </a>
                        </nav>
                    </div>

                    <div class="nav-block">
                        <div class="nav-block-title">
                            <i class="fas fa-bolt"></i> Services Rapides
                        </div>
                        <nav>
                            <a class="nav-link" href="{{ route('importexport.demande') }}">
                                <span>Demande d'importation</span>
                                <span class="nav-arrow"><i class="fas fa-chevron-right"></i></span>
                            </a>
                            <a class="nav-link" href="{{ route('submitcolis') }}">
                                <span>Inspection des colis</span>
                                <span class="nav-arrow"><i class="fas fa-chevron-right"></i></span>
                            </a>
                            <a class="nav-link" href="{{ route('vigilance.signalement') }}">
                                <span>Signalement PMQIF</span>
                                <span class="nav-arrow"><i class="fas fa-chevron-right"></i></span>
                            </a>
                            <a class="nav-link" href="{{ route('vigilance.delegue') }}">
                                <span>Délégués médicaux</span>
                                <span class="nav-arrow"><i class="fas fa-chevron-right"></i></span>
                            </a>
                        </nav>
                    </div>

                    <div class="nav-block">
                        <div class="nav-block-title">
                            <i class="fas fa-map-marker-alt"></i> Points d'Entrée
                        </div>
                        <nav>
                            <a class="nav-link" href="#"><span>Aéroport Melchior Ndadaye</span><span class="nav-arrow"><i class="fas fa-chevron-right"></i></span></a>
                            <a class="nav-link" href="#"><span>Port de Bujumbura</span><span class="nav-arrow"><i class="fas fa-chevron-right"></i></span></a>
                            <a class="nav-link" href="#"><span>Frontière de Kobero</span><span class="nav-arrow"><i class="fas fa-chevron-right"></i></span></a>
                            <a class="nav-link" href="#"><span>Frontière de Kanyaru haut</span><span class="nav-arrow"><i class="fas fa-chevron-right"></i></span></a>
                            <a class="nav-link" href="#"><span>Frontière Gasenyi Nemba</span><span class="nav-arrow"><i class="fas fa-chevron-right"></i></span></a>
                            <a class="nav-link" href="#"><span>Frontière Gatumba</span><span class="nav-arrow"><i class="fas fa-chevron-right"></i></span></a>
                        </nav>
                    </div>

                    <div class="sidebar-contact">
                        <div class="sc-icon"><i class="fas fa-microscope"></i></div>
                        <h4>Laboratoire ABREMA</h4>
                        <p>Pour toute demande d'analyse ou d'information</p>
                        <span class="sc-phone">+257 22 22 97 39</span>
                        <span class="sc-label">Numéro vert gratuit : 203</span>
                    </div>

                </aside>

                {{-- ══ CONTENU ══ --}}
                <main class="main-content">

                    <h2>Service Laboratoire</h2>

                    <p>
                        L'accès pour tous à des médicaments et autres produits réglementés de bonne qualité,
                        sûrs et efficaces contribue de manière très significative à l'accès à la santé qui est
                        l'un des objectifs de développement durable. Les produits de santé de qualité inférieure
                        ou falsifiés constituent une menace pour la santé publique mondiale et posent un problème
                        particulièrement sérieux dans les pays à revenu faible ou intermédiaire.
                    </p>

                    <p>
                        C'est dans cette optique que l'ABREMA a été mis en place comme une agence de régulation
                        des produits réglementés comportant une <strong>Direction des services de laboratoire et
                        de régulation de contrôle de la qualité des aliments</strong>.
                    </p>

                    <div class="info-box">
                        <h3><i class="fas fa-flask"></i> Mission de la Direction</h3>
                        <p>
                            Cette Direction est chargée de contrôler l'application des normes de qualité, superviser
                            et coordonner les activités de contrôle de qualité des médicaments à usage humain, des
                            médicaments traditionnels, des produits cosmétiques et diététiques contenant un principe actif ;
                            réglementer toutes les activités relatives à la qualité et l'innocuité des aliments préfabriqués
                            et emballés sur toute la chaîne depuis la production jusqu'à leur consommation.
                        </p>
                    </div>

                    <div class="content-section">
                        <h3>Domaines d'activité</h3>
                        <div class="feat-grid">
                            <div class="feat-card">
                                <div class="feat-icon"><i class="fas fa-pills"></i></div>
                                <div>
                                    <h4>Médicaments à usage humain</h4>
                                    <p>Contrôle qualité des médicaments conventionnels sur le marché burundais.</p>
                                </div>
                            </div>
                            <div class="feat-card">
                                <div class="feat-icon"><i class="fas fa-leaf"></i></div>
                                <div>
                                    <h4>Médicaments traditionnels</h4>
                                    <p>Supervision des médicaments à base de plantes et produits de médecine traditionnelle.</p>
                                </div>
                            </div>
                            <div class="feat-card">
                                <div class="feat-icon"><i class="fas fa-spa"></i></div>
                                <div>
                                    <h4>Produits cosmétiques</h4>
                                    <p>Réglementation des produits cosmétiques et diététiques contenant un principe actif.</p>
                                </div>
                            </div>
                            <div class="feat-card">
                                <div class="feat-icon"><i class="fas fa-apple-alt"></i></div>
                                <div>
                                    <h4>Aliments préfabriqués</h4>
                                    <p>Contrôle de la qualité et de l'innocuité des aliments emballés de la production à la consommation.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>En savoir plus</h3>
                        <p>
                            Consultez la page dédiée pour en savoir davantage sur les objectifs détaillés,
                            les missions d'ordre public et les prestations de services du laboratoire de l'ABREMA.
                        </p>
                        <a href="{{ route('labocontrol.apropos') }}" class="btn-primary-page">
                            <i class="fas fa-arrow-right"></i> À propos du Laboratoire
                        </a>
                    </div>

                </main>

            </div>
        </div>
    </div>

@endsection