@extends('layouts.base')

@section('title', 'Liste Nationale des Médicaments Essentiels | ')

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
            <span class="current">Médicaments Essentiels</span>
        </div>
        <h1>Liste Nationale des Médicaments Essentiels</h1>
        <p class="lead">Médicaments essentiels réglementés au Burundi par l'ABREMA</p>
    </div>

    {{-- ── MAIN LAYOUT ── --}}
    <div class="main-layout">
        <div class="container-fluid">
            <div class="layout-row">

                {{-- ══ SIDEBAR ══ --}}
                <aside class="sidebar-nav">

                    <div class="nav-block">
                        <nav>
                            <a class="nav-link {{ Route::is('medicament.listemedicament') ? 'active' : '' }}"
                               href="{{ route('medicament.listemedicament') }}">
                                <span>Médicaments Essentiels</span>
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
                        <div class="sc-icon"><i class="fas fa-pills"></i></div>
                        <h4>Service Enregistrement</h4>
                        <p>Pour toute question sur la liste des médicaments essentiels</p>
                        <span class="sc-phone">+257 22 22 97 39</span>
                        <span class="sc-label">Numéro vert gratuit : 203</span>
                    </div>

                    <a href="{{ asset('files/listemedicament.pdf') }}" download class="sidebar-pdf">
                        <i class="fas fa-download"></i> Télécharger la Liste PDF
                    </a>

                </aside>

                {{-- ══ CONTENU ══ --}}
                <main class="main-content">

                    <h2>Liste Nationale des Médicaments Essentiels au Burundi</h2>

                    <p>
                        La liste nationale des médicaments essentiels recense l'ensemble des médicaments
                        dont la disponibilité est jugée indispensable pour répondre aux besoins prioritaires
                        de santé de la population burundaise. Elle est établie et mise à jour régulièrement
                        par l'ABREMA conformément aux recommandations de l'OMS.
                    </p>

                    <div class="info-box">
                        <h3><i class="fas fa-info-circle"></i> À propos de cette liste</h3>
                        <p>
                            Cette liste est un outil de référence pour les prescripteurs, les pharmaciens,
                            les gestionnaires de stocks et les décideurs en matière de politique de santé.
                            Elle facilite les approvisionnements, la formation et le contrôle de la qualité
                            des médicaments au Burundi.
                        </p>
                    </div>

                    <div class="content-section">
                        <h3>Document officiel</h3>

                        <div class="pdf-viewer-wrapper">
                            <div class="pdf-viewer-header">
                                <span>
                                    <i class="fas fa-file-pdf"></i>
                                    Liste Nationale des Médicaments Essentiels
                                </span>
                                <a href="{{ asset('files/listemedicament.pdf') }}" target="_blank">
                                    <i class="fas fa-external-link-alt"></i> Ouvrir dans un nouvel onglet
                                </a>
                            </div>
                            <embed src="{{ asset('files/listemedicament.pdf') }}"
                                   type="application/pdf" width="100%" height="780px">
                        </div>

                        <div style="display:flex; gap:12px; margin-top:14px;">
                            <a href="{{ asset('files/listemedicament.pdf') }}"
                               target="_blank" class="btn-primary-page">
                                <i class="fas fa-eye"></i> Voir en plein écran
                            </a>
                            <a href="{{ asset('files/listemedicament.pdf') }}"
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