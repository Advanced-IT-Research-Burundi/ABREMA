@extends('layouts.base')

@section('title', 'Textes Réglementaires sur la Vigilance | ')

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

    <div class="page-banner">
        <div class="banner-breadcrumb">
            <a href="{{ route('home') }}">Accueil</a>
            <i class="fas fa-chevron-right"></i>
            <span class="current">Textes Réglementaires — Vigilance</span>
        </div>
        <h1>Textes Réglementaires sur la Vigilance</h1>
        <p class="lead">Cadre légal régissant la pharmacovigilance et la publicité médicale au Burundi</p>
    </div>

    <div class="main-layout">
        <div class="container-fluid">
            <div class="layout-row">

                <aside class="sidebar-nav">
                    <div class="nav-block">
                        <nav>
                            <a class="nav-link {{ Route::is('vigilance.signalement') ? 'active' : '' }}"
                               href="{{ route('vigilance.signalement') }}">
                                <span>Signalement PMQIF</span>
                                <span class="nav-arrow"><i class="fas fa-chevron-right"></i></span>
                            </a>
                            <a class="nav-link {{ Route::is('vigilance.delegue') ? 'active' : '' }}"
                               href="{{ route('vigilance.delegue') }}">
                                <span>Délégués Médicaux</span>
                                <span class="nav-arrow"><i class="fas fa-chevron-right"></i></span>
                            </a>
                            <a class="nav-link {{ Route::is('vigilance.notificationES') ? 'active' : '' }}"
                               href="{{ route('vigilance.notificationES') }}">
                                <span>Notifications ES</span>
                                <span class="nav-arrow"><i class="fas fa-chevron-right"></i></span>
                            </a>
                            <a class="nav-link {{ Route::is('vigilance.rappel') ? 'active' : '' }}"
                               href="{{ route('vigilance.rappel') }}">
                                <span>Rappel des Produits</span>
                                <span class="nav-arrow"><i class="fas fa-chevron-right"></i></span>
                            </a>
                            <a class="nav-link {{ Route::is('vigilance.textevigilance') ? 'active' : '' }}"
                               href="{{ route('vigilance.textevigilance') }}">
                                <span>Textes Réglementaires</span>
                                <span class="nav-arrow"><i class="fas fa-chevron-right"></i></span>
                            </a>
                        </nav>
                    </div>

                    <div class="nav-block">
                        <div class="nav-block-title"><i class="fas fa-bolt"></i> Services Rapides</div>
                        <nav>
                            <a class="nav-link" href="{{ route('importexport.demande') }}"><span>Demande d'importation</span><span class="nav-arrow"><i class="fas fa-chevron-right"></i></span></a>
                            <a class="nav-link" href="{{ route('submitcolis') }}"><span>Inspection des colis</span><span class="nav-arrow"><i class="fas fa-chevron-right"></i></span></a>
                            <a class="nav-link" href="{{ route('vigilance.signalement') }}"><span>Signalement PMQIF</span><span class="nav-arrow"><i class="fas fa-chevron-right"></i></span></a>
                            <a class="nav-link" href="{{ route('vigilance.delegue') }}"><span>Délégués médicaux</span><span class="nav-arrow"><i class="fas fa-chevron-right"></i></span></a>
                        </nav>
                    </div>

                    <div class="nav-block">
                        <div class="nav-block-title"><i class="fas fa-map-marker-alt"></i> Points d'Entrée</div>
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
                        <p>Pour toute question sur le cadre légal de la vigilance</p>
                        <span class="sc-phone">+257 22 22 97 39</span>
                        <span class="sc-label">Numéro vert gratuit : 203</span>
                    </div>

                    <a href="{{ asset('files/texte_vigilance_publicite.pdf') }}"
                       download class="sidebar-pdf">
                        <i class="fas fa-download"></i> Télécharger le Texte PDF
                    </a>
                </aside>

                <main class="main-content">

                    <h2>Textes Réglementaires sur la Vigilance et la Publicité</h2>

                    <p>
                        Ces textes définissent le cadre légal encadrant la pharmacovigilance, la
                        matériovigilance, le signalement des événements indésirables et le contrôle
                        de la promotion et de la publicité médicale au Burundi.
                    </p>

                    <div class="info-box">
                        <h3><i class="fas fa-balance-scale"></i> Importance de ce cadre réglementaire</h3>
                        <p>
                            Une réglementation robuste sur la vigilance et la publicité médicale garantit
                            que seules des informations exactes et validées scientifiquement sont diffusées
                            aux professionnels de santé et au grand public, protégeant ainsi les patients
                            contre des pratiques promotionnelles trompeuses.
                        </p>
                    </div>

                    <div class="content-section">
                        <h3>Texte de Vigilance et Publicité</h3>
                        <p>
                            Ce document réglementaire encadre les obligations en matière de pharmacovigilance,
                            de signalement d'événements indésirables et de contrôle de la publicité médicale
                            sur le territoire burundais.
                        </p>

                        <div class="pdf-viewer-wrapper">
                            <div class="pdf-viewer-header">
                                <span>
                                    <i class="fas fa-file-pdf"></i>
                                    Texte de Vigilance et Publicité
                                </span>
                                <a href="{{ asset('files/texte_vigilance_publicite.pdf') }}" target="_blank">
                                    <i class="fas fa-external-link-alt"></i> Ouvrir dans un nouvel onglet
                                </a>
                            </div>
                            <embed src="{{ asset('files/texte_vigilance_publicite.pdf') }}"
                                   type="application/pdf" width="100%" height="780px">
                        </div>

                        <div style="display:flex; gap:12px; margin-top:14px;">
                            <a href="{{ asset('files/texte_vigilance_publicite.pdf') }}"
                               target="_blank" class="btn-primary-page">
                                <i class="fas fa-eye"></i> Voir en plein écran
                            </a>
                            <a href="{{ asset('files/texte_vigilance_publicite.pdf') }}"
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