@extends('layouts.base')

@section('title', 'Textes Réglementaires sur les Médicaments | ')

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

        .doc-section { padding-top: 32px; margin-top: 32px; border-top: 1px solid var(--gray-100); }
        .doc-section:first-of-type { padding-top: 0; margin-top: 0; border-top: none; }
    </style>
@endsection

@section('content')

    {{-- ── PAGE BANNER ── --}}
    <div class="page-banner">
        <div class="banner-breadcrumb">
            <a href="{{ route('home') }}">Accueil</a>
            <i class="fas fa-chevron-right"></i>
            <span class="current">Textes Réglementaires</span>
        </div>
        <h1>Textes Réglementaires sur les Médicaments</h1>
        <p class="lead">Cadre légal et réglementaire régissant les médicaments au Burundi</p>
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
                            <a class="nav-link {{ Route::is('medicament.notifications') ? 'active' : '' }}"
                               href="{{ route('medicament.notifications') }}">
                                <span>Notifications</span>
                                <span class="nav-arrow"><i class="fas fa-chevron-right"></i></span>
                            </a>
                            <a class="nav-link {{ Route::is('medicament.produits') ? 'active' : '' }}"
                               href="{{ route('medicament.produits') }}">
                                <span>Médicaments Enregistrés</span>
                                <span class="nav-arrow"><i class="fas fa-chevron-right"></i></span>
                            </a>
                            <a class="nav-link {{ Route::is('medicament.textemedicament') ? 'active' : '' }}"
                               href="{{ route('medicament.textemedicament') }}">
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
                        <div class="sc-icon"><i class="fas fa-gavel"></i></div>
                        <h4>Service Juridique</h4>
                        <p>Pour toute question sur le cadre légal des médicaments</p>
                        <span class="sc-phone">+257 22 22 97 39</span>
                        <span class="sc-label">Numéro vert gratuit : 203</span>
                    </div>

                </aside>

                {{-- ══ CONTENU ══ --}}
                <main class="main-content">

                    <h2>Textes Réglementaires sur les Médicaments</h2>

                    <p>
                        L'ABREMA exerce ses missions dans le cadre d'un ensemble de textes législatifs et
                        réglementaires qui définissent les règles applicables aux médicaments et produits
                        de santé au Burundi.
                    </p>

                    <div class="info-box">
                        <h3><i class="fas fa-balance-scale"></i> Base légale</h3>
                        <p>
                            Ces textes constituent le fondement juridique de toute activité réglementaire
                            de l'ABREMA : enregistrement des médicaments, autorisation des établissements,
                            inspection, pharmacovigilance et contrôle qualité.
                        </p>
                    </div>

                    {{-- ── Document 1 : Loi Pharmaceutique ── --}}
                    <div class="doc-section">
                        <h3>Loi Pharmaceutique</h3>
                        <p>
                            La loi pharmaceutique du Burundi définit le cadre juridique général régissant
                            la fabrication, l'importation, la distribution et la dispensation des médicaments
                            à usage humain sur le territoire national.
                        </p>

                        <div class="pdf-viewer-wrapper">
                            <div class="pdf-viewer-header">
                                <span>
                                    <i class="fas fa-file-pdf"></i>
                                    Loi Pharmaceutique du Burundi
                                </span>
                                <a href="{{ asset('files/LOI PARMACEUTIQUE.pdf') }}" target="_blank">
                                    <i class="fas fa-external-link-alt"></i> Ouvrir dans un nouvel onglet
                                </a>
                            </div>
                            <embed src="{{ asset('files/LOI PARMACEUTIQUE.pdf') }}"
                                   type="application/pdf" width="100%" height="780px">
                        </div>

                        <div style="display:flex; gap:12px; margin-top:14px;">
                            <a href="{{ asset('files/LOI PARMACEUTIQUE.pdf') }}"
                               target="_blank" class="btn-primary-page">
                                <i class="fas fa-eye"></i> Voir en plein écran
                            </a>
                            <a href="{{ asset('files/LOI PARMACEUTIQUE.pdf') }}"
                               download class="btn-gold-page">
                                <i class="fas fa-download"></i> Télécharger
                            </a>
                        </div>
                    </div>

                    {{-- ── Document 2 : Décret ABREMA ── --}}
                    <div class="doc-section">
                        <h3>Décret portant Création, Organisation et Fonctionnement de l'ABREMA</h3>
                        <p>
                            Ce décret institue officiellement l'ABREMA, définit ses missions, son organisation
                            interne, ses attributions réglementaires et les modalités de son fonctionnement
                            en tant qu'autorité de régulation des médicaments et aliments au Burundi.
                        </p>

                        <div class="pdf-viewer-wrapper">
                            <div class="pdf-viewer-header">
                                <span>
                                    <i class="fas fa-file-pdf"></i>
                                    Décret de Création de l'ABREMA
                                </span>
                                <a href="{{ asset('files/DECRET PORTANT CREATION,ORGANISATION ET FONCTIONNEMENT DE ABREMA.pdf') }}" target="_blank">
                                    <i class="fas fa-external-link-alt"></i> Ouvrir dans un nouvel onglet
                                </a>
                            </div>
                            <embed src="{{ asset('files/DECRET PORTANT CREATION,ORGANISATION ET FONCTIONNEMENT DE ABREMA.pdf') }}"
                                   type="application/pdf" width="100%" height="780px">
                        </div>

                        <div style="display:flex; gap:12px; margin-top:14px;">
                            <a href="{{ asset('files/DECRET PORTANT CREATION,ORGANISATION ET FONCTIONNEMENT DE ABREMA.pdf') }}"
                               target="_blank" class="btn-primary-page">
                                <i class="fas fa-eye"></i> Voir en plein écran
                            </a>
                            <a href="{{ asset('files/DECRET PORTANT CREATION,ORGANISATION ET FONCTIONNEMENT DE ABREMA.pdf') }}"
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