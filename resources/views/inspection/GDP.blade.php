@extends('layouts.base')

@section('title', 'Inspection GDP | ')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/pages.css') }}">
@endsection

@section('content')

    {{-- ── PAGE BANNER ── --}}
    <div class="page-banner">
        <div class="banner-breadcrumb">
            <a href="{{ route('home') }}">Accueil</a>
            <i class="fas fa-chevron-right"></i>
            <a href="{{ route('inspection.etablissement') }}">Inspection</a>
            <i class="fas fa-chevron-right"></i>
            <span class="current">Inspection GDP</span>
        </div>
        <h1>Inspection GDP</h1>
        <p class="lead">Bonnes Pratiques de Stockage et de Distribution des produits de santé</p>
    </div>

    {{-- ── MAIN LAYOUT ── --}}
    <div class="main-layout">
        <div class="container-fluid">
            <div class="layout-row">

                {{-- ══ SIDEBAR ══ --}}
                <aside class="sidebar-nav">

                    <div class="nav-block">
                        <nav>
                            <a class="nav-link {{ Route::is('inspection.etablissement') ? 'active' : '' }}"
                               href="{{ route('inspection.etablissement') }}">
                                <span>Établissements</span>
                                <span class="nav-arrow"><i class="fas fa-chevron-right"></i></span>
                            </a>
                            <a class="nav-link {{ Route::is('inspection.GDP') ? 'active' : '' }}"
                               href="{{ route('inspection.GDP') }}">
                                <span>Inspection GDP</span>
                                <span class="nav-arrow"><i class="fas fa-chevron-right"></i></span>
                            </a>
                            <a class="nav-link {{ Route::is('inspection.GMP') ? 'active' : '' }}"
                               href="{{ route('inspection.GMP') }}">
                                <span>Inspection GMP</span>
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
                        <div class="sc-icon"><i class="fas fa-warehouse"></i></div>
                        <h4>Service Inspection</h4>
                        <p>Pour toute demande liée aux inspections GDP</p>
                        <span class="sc-phone">+257 22 22 97 39</span>
                        <span class="sc-label">Numéro vert gratuit : 203</span>
                    </div>

                </aside>

                {{-- ══ CONTENU ══ --}}
                <main class="main-content">

                    <h2>Inspection GDP</h2>

                    <p>
                        L'ABREMA effectue des inspections réglementaires dans les établissements de vente en
                        gros et en détail des médicaments, des dispositifs médicaux et des autres produits de
                        santé locaux et étrangers en vue de vérifier la conformité aux <strong>Bonnes Pratiques
                        de Stockage et de Distribution (BPSD / GDP)</strong>.
                    </p>

                    <div class="info-box">
                        <h3><i class="fas fa-truck"></i> Qu'est-ce que le GDP ?</h3>
                        <p>
                            Le GDP (Good Distribution Practice) est un ensemble de lignes directrices qui garantissent
                            que la qualité et l'intégrité des médicaments sont maintenues tout au long de la chaîne
                            d'approvisionnement, depuis le fabricant jusqu'au patient.
                        </p>
                    </div>

                    <div class="content-section">
                        <h3>Établissements concernés</h3>
                        <div class="feat-grid">
                            <div class="feat-card">
                                <div class="feat-icon"><i class="fas fa-warehouse"></i></div>
                                <div>
                                    <h4>Grossistes en médicaments</h4>
                                    <p>Vérification des conditions de stockage, de la traçabilité et de la gestion des stocks.</p>
                                </div>
                            </div>
                            <div class="feat-card">
                                <div class="feat-icon"><i class="fas fa-store"></i></div>
                                <div>
                                    <h4>Détaillants pharmaceutiques</h4>
                                    <p>Contrôle des pharmacies et points de vente de médicaments sur le territoire national.</p>
                                </div>
                            </div>
                            <div class="feat-card">
                                <div class="feat-icon"><i class="fas fa-heartbeat"></i></div>
                                <div>
                                    <h4>Dispositifs médicaux</h4>
                                    <p>Inspection des distributeurs de dispositifs médicaux locaux et importés.</p>
                                </div>
                            </div>
                            <div class="feat-card">
                                <div class="feat-icon"><i class="fas fa-globe"></i></div>
                                <div>
                                    <h4>Produits étrangers</h4>
                                    <p>Contrôle des importateurs de produits de santé provenant de l'étranger.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Critères d'inspection GDP</h3>
                        <ul>
                            <li>Conditions de température et d'humidité dans les entrepôts</li>
                            <li>Système de traçabilité et gestion des lots</li>
                            <li>Procédures de réception, stockage et expédition</li>
                            <li>Gestion des produits retournés, endommagés ou périmés</li>
                            <li>Qualification du personnel et formations continues</li>
                            <li>Système de documentation et d'archivage</li>
                            <li>Plan de rappel de produits en cas de non-conformité</li>
                        </ul>
                    </div>

                </main>

            </div>
        </div>
    </div>

@endsection