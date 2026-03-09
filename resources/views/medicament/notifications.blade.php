@extends('layouts.base')

@section('title', 'Notifications sur les Médicaments | ')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/pages.css') }}">
@endsection

@section('content')

    {{-- ── PAGE BANNER ── --}}
    <div class="page-banner">
        <div class="banner-breadcrumb">
            <a href="{{ route('home') }}">Accueil</a>
            <i class="fas fa-chevron-right"></i>
            <span class="current">Notifications sur les Médicaments</span>
        </div>
        <h1>Notifications sur les Médicaments</h1>
        <p class="lead">Produits autorisés à circuler en attente d'homologation officielle</p>
    </div>

    {{-- ── MAIN LAYOUT ── --}}
    <div class="main-layout">
        <div class="container-fluid">
            <div class="layout-row">

                {{-- ══ SIDEBAR ══ --}}
                <aside class="sidebar-nav">

                    <div class="nav-block">
                        <nav>
                            <a class="nav-link {{ Route::is('enregistrement.listemedicament') ? 'active' : '' }}"
                               href="{{ route('enregistrement.listemedicament') }}">
                                <span>Médicaments Essentiels</span>
                                <span class="nav-arrow"><i class="fas fa-chevron-right"></i></span>
                            </a>
                            <a class="nav-link {{ Route::is('enregistrement.notifications') ? 'active' : '' }}"
                               href="{{ route('enregistrement.notifications') }}">
                                <span>Notifications</span>
                                <span class="nav-arrow"><i class="fas fa-chevron-right"></i></span>
                            </a>
                            <a class="nav-link {{ Route::is('medicament.produits') ? 'active' : '' }}"
                               href="{{ route('medicament.produits') }}">
                                <span>Médicaments Enregistrés</span>
                                <span class="nav-arrow"><i class="fas fa-chevron-right"></i></span>
                            </a>
                            <a class="nav-link {{ Route::is('enregistrement.textes') ? 'active' : '' }}"
                               href="{{ route('enregistrement.textes') }}">
                                <span>Textes Réglementaires</span>
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
                        <div class="sc-icon"><i class="fas fa-bell"></i></div>
                        <h4>Service Enregistrement</h4>
                        <p>Pour toute question sur les notifications médicaments</p>
                        <span class="sc-phone">+257 22 22 97 39</span>
                        <span class="sc-label">Numéro vert gratuit : 203</span>
                    </div>

                </aside>

                {{-- ══ CONTENU ══ --}}
                <main class="main-content">

                    <h2>Notifications sur les Médicaments</h2>

                    <p>
                        C'est la liste des produits circulant au Burundi et autorisés à être importés
                        en attendant leur homologation officielle auprès de l'ABREMA.
                    </p>

                    <div class="info-box">
                        <h3><i class="fas fa-info-circle"></i> Qu'est-ce qu'une notification ?</h3>
                        <p>
                            La procédure de notification permet à un produit pharmaceutique de circuler
                            légalement sur le marché burundais pendant la période d'instruction de son
                            dossier d'Autorisation de Mise sur le Marché (AMM). Elle est accordée sous
                            réserve de la conformité du produit aux normes de qualité, sécurité et efficacité.
                        </p>
                    </div>

                    <div class="content-section">
                        <h3>Conditions de notification</h3>
                        <div class="feat-grid">
                            <div class="feat-card">
                                <div class="feat-icon"><i class="fas fa-file-medical"></i></div>
                                <div>
                                    <h4>Dossier en cours</h4>
                                    <p>Le produit doit avoir un dossier AMM déposé et en cours d'instruction à l'ABREMA.</p>
                                </div>
                            </div>
                            <div class="feat-card">
                                <div class="feat-icon"><i class="fas fa-shield-alt"></i></div>
                                <div>
                                    <h4>Conformité qualité</h4>
                                    <p>Le produit doit satisfaire aux exigences minimales de qualité, sécurité et efficacité.</p>
                                </div>
                            </div>
                            <div class="feat-card">
                                <div class="feat-icon"><i class="fas fa-clock"></i></div>
                                <div>
                                    <h4>Durée limitée</h4>
                                    <p>La notification est temporaire et expire dès la décision finale sur le dossier AMM.</p>
                                </div>
                            </div>
                            <div class="feat-card">
                                <div class="feat-icon"><i class="fas fa-eye"></i></div>
                                <div>
                                    <h4>Surveillance continue</h4>
                                    <p>Les produits notifiés restent sous surveillance de l'ABREMA jusqu'à leur homologation.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="alert-box">
                        <h3><i class="fas fa-exclamation-circle"></i> Attention</h3>
                        <p>
                            Les produits figurant sur cette liste sont autorisés à titre provisoire. Leur
                            présence ne garantit pas leur homologation définitive. Tout signalement
                            d'effets indésirables doit être communiqué à l'ABREMA via le service de pharmacovigilance.
                        </p>
                    </div>

                </main>

            </div>
        </div>
    </div>

@endsection