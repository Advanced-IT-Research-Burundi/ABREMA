@extends('layouts.base')

@section('title', 'Demande d\'Autorisation d\'Importation | ')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/pages.css') }}">
    <style>
        .pdf-viewer-wrapper {
            width: 100%; border: 1px solid var(--gray-200);
            background: var(--gray-50); overflow: hidden; margin-top: 10px;
        }
        .pdf-viewer-header {
            display: flex; align-items: center; justify-content: space-between;
            padding: 12px 16px; background: var(--green-dark); color: #fff;
        }
        .pdf-viewer-header span {
            font-size: 0.84rem; font-weight: 600;
            display: flex; align-items: center; gap: 8px;
        }
        .pdf-viewer-header span i { color: var(--gold); }
        .pdf-viewer-header a {
            font-size: 0.8rem; color: var(--gold-light);
            text-decoration: none; display: flex; align-items: center;
            gap: 5px; transition: color .2s;
        }
        .pdf-viewer-header a:hover { color: #fff; }
        .pdf-viewer-wrapper embed { display: block; width: 100%; height: 780px; border: none; }
    </style>
@endsection

@section('content')

    {{-- ── PAGE BANNER ── --}}
    <div class="page-banner">
        <div class="banner-breadcrumb">
            <a href="{{ route('home') }}">Accueil</a>
            <i class="fas fa-chevron-right"></i>
            <span class="current">Importations &amp; Exportations</span>
        </div>
        <h1>Importations et Exportations</h1>
        <p class="lead">Procédures d'autorisation pour l'importation et l'exportation des produits de santé au Burundi</p>
    </div>

    {{-- ── MAIN LAYOUT ── --}}
    <div class="main-layout">
        <div class="container-fluid">
            <div class="layout-row">

                {{-- ══ SIDEBAR ══ --}}
                <aside class="sidebar-nav">

                    <div class="nav-block">
                        <nav>
                            <a class="nav-link {{ Route::is('importexport.demande') ? 'active' : '' }}"
                               href="{{ route('importexport.demande') }}">
                                <span>Demande d'autorisation</span>
                                <span class="nav-arrow"><i class="fas fa-chevron-right"></i></span>
                            </a>
                            <a class="nav-link {{ Route::is('importexport.texteimport') ? 'active' : '' }}"
                               href="{{ route('importexport.texteimport') }}">
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
                        <div class="sc-icon"><i class="fas fa-headset"></i></div>
                        <h4>Besoin d'assistance ?</h4>
                        <p>Notre équipe vous accompagne dans vos démarches d'importation</p>
                        <span class="sc-phone">+257 22 22 97 39</span>
                        <span class="sc-label">Numéro vert gratuit : 203</span>
                    </div>

                    <a href="{{ asset('files/2025040709010267f3944edf211.pdf') }}" download class="sidebar-pdf">
                        <i class="fas fa-file-pdf"></i> Note aux Importateurs PDF
                    </a>

                </aside>

                {{-- ══ CONTENU ══ --}}
                <main class="main-content">

                    <h2>Demande d'une Autorisation d'Importation</h2>

                    <p>
                        La procédure d'obtention d'une autorisation d'importation des médicaments et autres produits
                        de santé se fait via un système automatisé du Guichet Unique Électronique <strong>« ASYCUDA »</strong>.
                        Ce système permet de mettre en étroite collaboration l'ABREMA et les services douaniers
                        de l'OBR, ce qui rend facile et rapide le contrôle d'entrée des médicaments et autres produits
                        de santé sur tout le territoire du pays.
                    </p>

                    <div class="feat-grid">
                        <div class="feat-card">
                            <div class="feat-icon"><i class="fas fa-laptop"></i></div>
                            <div>
                                <h4>Système ASYCUDA</h4>
                                <p>Demande en ligne via le Guichet Unique Électronique en collaboration avec l'OBR.</p>
                            </div>
                        </div>
                        <div class="feat-card">
                            <div class="feat-icon"><i class="fas fa-search"></i></div>
                            <div>
                                <h4>Inspection physique</h4>
                                <p>À l'arrivée des produits, inspection par les officiers inspecteurs de l'ABREMA.</p>
                            </div>
                        </div>
                        <div class="feat-card">
                            <div class="feat-icon"><i class="fas fa-check-circle"></i></div>
                            <div>
                                <h4>Libération des produits</h4>
                                <p>Les produits conformes sont libérés des services douaniers pour mise en consommation.</p>
                            </div>
                        </div>
                        <div class="feat-card">
                            <div class="feat-icon"><i class="fas fa-ban"></i></div>
                            <div>
                                <h4>Mise en quarantaine</h4>
                                <p>Les produits non conformes sont mis en quarantaine en attente de leur destruction.</p>
                            </div>
                        </div>
                    </div>

                    <div class="alert-box" style="margin-top: 6px;">
                        <h3><i class="fas fa-info-circle"></i> Documents requis</h3>
                        <p>
                            <strong>LES DOCUMENTS EXIGÉS</strong> pour constituer un dossier de demande d'autorisation
                            d'importation : <em>« Voir note d'instruction du 22/06/2021 »</em>.<br>
                            <strong>NB :</strong> L'ABREMA se réserve le droit de demander tout document jugé nécessaire
                            pour optimiser l'analyse et le traitement d'une demande.
                        </p>
                    </div>

                    <div class="content-section">
                        <h3>Notes aux Importateurs</h3>
                        <p>Consultez ci-dessous la note officielle aux importateurs de médicaments et produits de santé.</p>

                        <div class="pdf-viewer-wrapper">
                            <div class="pdf-viewer-header">
                                <span><i class="fas fa-file-pdf"></i> Note aux Importateurs — ABREMA</span>
                                <a href="{{ asset('files/2025040709010267f3944edf211.pdf') }}" target="_blank">
                                    <i class="fas fa-external-link-alt"></i> Ouvrir dans un nouvel onglet
                                </a>
                            </div>
                            <embed src="{{ asset('files/2025040709010267f3944edf211.pdf') }}"
                                   type="application/pdf" width="100%" height="780px">
                        </div>

                        <div style="display:flex; gap:12px; margin-top:14px;">
                            <a href="{{ asset('files/2025040709010267f3944edf211.pdf') }}"
                               target="_blank" class="btn-primary-page">
                                <i class="fas fa-eye"></i> Voir en plein écran
                            </a>
                            <a href="{{ asset('files/2025040709010267f3944edf211.pdf') }}"
                               download class="btn-gold-page">
                                <i class="fas fa-download"></i> Télécharger
                            </a>
                        </div>
                    </div>

                </main>

            </div>
        </div>
    </div>

@endsection