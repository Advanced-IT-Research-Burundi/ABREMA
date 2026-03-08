@extends('layouts.base')

@section('title', 'Inspection GMP | ')

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
            <span class="current">Inspection GMP</span>
        </div>
        <h1>Inspection GMP</h1>
        <p class="lead">Bonnes Pratiques de Fabrication des médicaments et produits de santé</p>
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
                        <div class="sc-icon"><i class="fas fa-industry"></i></div>
                        <h4>Service Inspection</h4>
                        <p>Pour toute demande liée aux inspections GMP</p>
                        <span class="sc-phone">+257 22 22 97 39</span>
                        <span class="sc-label">Numéro vert gratuit : 203</span>
                    </div>

                </aside>

                {{-- ══ CONTENU ══ --}}
                <main class="main-content">

                    <h2>Inspection GMP</h2>

                    <p>
                        L'ABREMA effectue des inspections réglementaires dans les usines de fabrication
                        locales et étrangères en vue de vérifier la conformité aux <strong>Bonnes Pratiques
                        de Fabrication (BPF / GMP)</strong>.
                    </p>

                    <div class="info-box">
                        <h3><i class="fas fa-industry"></i> Qu'est-ce que le GMP ?</h3>
                        <p>
                            Le GMP (Good Manufacturing Practice) désigne l'ensemble des mesures prises pour
                            s'assurer que les médicaments sont produits et contrôlés de manière cohérente selon
                            des normes de qualité adaptées à leur utilisation prévue, conformément aux exigences
                            de l'autorisation de mise sur le marché.
                        </p>
                    </div>

                    <div class="content-section">
                        <h3>Domaines d'inspection GMP</h3>
                        <div class="feat-grid">
                            <div class="feat-card">
                                <div class="feat-icon"><i class="fas fa-building"></i></div>
                                <div>
                                    <h4>Locaux et équipements</h4>
                                    <p>Vérification de la conception, construction et entretien des installations de production.</p>
                                </div>
                            </div>
                            <div class="feat-card">
                                <div class="feat-icon"><i class="fas fa-users"></i></div>
                                <div>
                                    <h4>Personnel qualifié</h4>
                                    <p>Évaluation des qualifications, formations et responsabilités du personnel de fabrication.</p>
                                </div>
                            </div>
                            <div class="feat-card">
                                <div class="feat-icon"><i class="fas fa-file-alt"></i></div>
                                <div>
                                    <h4>Documentation</h4>
                                    <p>Contrôle des procédures écrites, dossiers de lot et systèmes d'archivage.</p>
                                </div>
                            </div>
                            <div class="feat-card">
                                <div class="feat-icon"><i class="fas fa-microscope"></i></div>
                                <div>
                                    <h4>Contrôle qualité</h4>
                                    <p>Inspection du laboratoire de contrôle interne et des méthodes analytiques.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Critères d'inspection GMP</h3>
                        <ul>
                            <li>Organisation et personnel : qualifications, hygiène et formation</li>
                            <li>Locaux et matériel : conception, construction, entretien et qualification</li>
                            <li>Documentation : procédures opératoires standard (SOP), dossiers de lot</li>
                            <li>Production : démarrage, conditionnement, étiquetage et contrôle en cours</li>
                            <li>Contrôle de la qualité : analyses, libération des lots et gestion des non-conformités</li>
                            <li>Sous-traitance et audits fournisseurs</li>
                            <li>Gestion des réclamations, rappels et retours de produits</li>
                            <li>Auto-inspection et audits qualité internes</li>
                        </ul>
                    </div>

                    <div class="alert-box">
                        <h3><i class="fas fa-exclamation-circle"></i> Obligation légale</h3>
                        <p>
                            Toute usine de fabrication de médicaments souhaitant exporter ses produits vers
                            le Burundi doit disposer d'un certificat GMP valide délivré par une autorité
                            réglementaire reconnue ou avoir été inspectée et certifiée par l'ABREMA.
                        </p>
                    </div>

                </main>

            </div>
        </div>
    </div>

@endsection