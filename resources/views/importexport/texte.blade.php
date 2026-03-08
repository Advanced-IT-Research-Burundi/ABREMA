@extends('layouts.base')

@section('title', 'Textes Réglementaires Import/Export | ')

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
            <a href="{{ route('importexport.demande') }}">Importations &amp; Exportations</a>
            <i class="fas fa-chevron-right"></i>
            <span class="current">Textes Réglementaires</span>
        </div>
        <h1>Textes Réglementaires sur les Importations et Exportations</h1>
        <p class="lead">Cadre juridique et réglementaire régissant les importations et exportations de produits de santé au Burundi</p>
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
                        <div class="sc-icon"><i class="fas fa-balance-scale"></i></div>
                        <h4>Cadre réglementaire ABREMA</h4>
                        <p>Pour toute question sur les textes en vigueur</p>
                        <span class="sc-phone">+257 22 22 97 39</span>
                        <span class="sc-label">Numéro vert gratuit : 203</span>
                    </div>

                    <a href="{{ asset('files/Texte reglementaire sur les importations et les exportation.pdf') }}"
                       download class="sidebar-pdf">
                        <i class="fas fa-file-pdf"></i> Télécharger le Texte PDF
                    </a>

                </aside>

                {{-- ══ CONTENU ══ --}}
                <main class="main-content">

                    <h2>Textes Réglementaires sur les Importations et Exportations</h2>

                    <p>
                        Ce document présente le cadre juridique et réglementaire qui régit les importations
                        et exportations de médicaments et autres produits de santé sur le territoire burundais,
                        conformément aux lois en vigueur.
                    </p>

                    <div class="info-box">
                        <h3><i class="fas fa-gavel"></i> Base légale</h3>
                        <p>
                            Ces textes réglementaires s'appuient sur la loi N°1/11 du 08 Mai 2020 portant
                            Réglementation de l'exercice de la Pharmacie et du Médicament à usage humain
                            et le décret N° 100/039 du 26 Février 2021 portant création de l'ABREMA.
                        </p>
                    </div>

                    <div class="content-section">
                        <h3>Texte Réglementaire — Importations et Exportations</h3>

                        <div class="pdf-viewer-wrapper">
                            <div class="pdf-viewer-header">
                                <span><i class="fas fa-file-pdf"></i> Texte Réglementaire Import/Export — ABREMA</span>
                                <a href="{{ asset('files/Texte reglementaire sur les importations et les exportation.pdf') }}"
                                   target="_blank">
                                    <i class="fas fa-external-link-alt"></i> Ouvrir dans un nouvel onglet
                                </a>
                            </div>
                            <embed src="{{ asset('files/Texte reglementaire sur les importations et les exportation.pdf') }}"
                                   type="application/pdf" width="100%" height="780px">
                        </div>

                        <div style="display:flex; gap:12px; margin-top:14px;">
                            <a href="{{ asset('files/Texte reglementaire sur les importations et les exportation.pdf') }}"
                               target="_blank" class="btn-primary-page">
                                <i class="fas fa-eye"></i> Voir en plein écran
                            </a>
                            <a href="{{ asset('files/Texte reglementaire sur les importations et les exportation.pdf') }}"
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