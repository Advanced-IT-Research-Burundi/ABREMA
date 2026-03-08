@extends('layouts.base')

@section('title', 'Organigramme | ')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/pages.css') }}">
    <style>
        .organigramme-wrapper {
            margin-top: 10px;
            border: 1px solid var(--gray-200);
            background: var(--gray-50);
            padding: 24px;
            text-align: center;
        }
        .organigramme-wrapper img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 0 auto;
            box-shadow: var(--shadow);
        }
        .organigramme-actions {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-top: 18px;
            justify-content: center;
        }
    </style>
@endsection

@section('content')

    {{-- ── PAGE BANNER ── --}}
    <div class="page-banner">
        <div class="banner-breadcrumb">
            <a href="{{ route('home') }}">Accueil</a>
            <i class="fas fa-chevron-right"></i>
            <a href="{{ route('about.profilabrema') }}">À Propos</a>
            <i class="fas fa-chevron-right"></i>
            <span class="current">Organigramme</span>
        </div>
        <h1>Organigramme de l'ABREMA</h1>
        <p class="lead">Structure organisationnelle de l'Autorité Burundaise de Régulation des Médicaments et des Aliments</p>
    </div>

    {{-- ── MAIN LAYOUT ── --}}
    <div class="main-layout">
        <div class="container-fluid">
            <div class="layout-row">

                {{-- ══ SIDEBAR GAUCHE ══ --}}
                <aside class="sidebar-nav">

                    {{-- Navigation --}}
                    <div class="nav-block">
                        <nav>
                            <a class="nav-link {{ Route::is('about.profilabrema') ? 'active' : '' }}"
                               href="{{ route('about.profilabrema') }}">
                                <span>Profil global d'ABREMA</span>
                                <span class="nav-arrow"><i class="fas fa-chevron-right"></i></span>
                            </a>
                            <a class="nav-link {{ Route::is('about.organigramme') ? 'active' : '' }}"
                               href="{{ route('about.organigramme') }}">
                                <span>Organigramme</span>
                                <span class="nav-arrow"><i class="fas fa-chevron-right"></i></span>
                            </a>
                            <a class="nav-link {{ Route::is('about.equipe') ? 'active' : '' }}"
                               href="{{ route('about.equipe') }}">
                                <span>Équipe de Direction</span>
                                <span class="nav-arrow"><i class="fas fa-chevron-right"></i></span>
                            </a>
                            <a class="nav-link {{ Route::is('about.fonction') ? 'active' : '' }}"
                               href="{{ route('about.fonction') }}">
                                <span>Fonction Réglementaire</span>
                                <span class="nav-arrow"><i class="fas fa-chevron-right"></i></span>
                            </a>
                            <a class="nav-link {{ Route::is('about.qms') ? 'active' : '' }}"
                               href="{{ route('about.qms') }}">
                                <span>QMS</span>
                                <span class="nav-arrow"><i class="fas fa-chevron-right"></i></span>
                            </a>
                        </nav>
                    </div>

                    {{-- Services Rapides --}}
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

                    {{-- Points d'entrée --}}
                    <div class="nav-block">
                        <div class="nav-block-title">
                            <i class="fas fa-map-marker-alt"></i> Points d'Entrée
                        </div>
                        <nav>
                            <a class="nav-link" href="#">
                                <span>Aéroport Melchior Ndadaye</span>
                                <span class="nav-arrow"><i class="fas fa-chevron-right"></i></span>
                            </a>
                            <a class="nav-link" href="#">
                                <span>Port de Bujumbura</span>
                                <span class="nav-arrow"><i class="fas fa-chevron-right"></i></span>
                            </a>
                            <a class="nav-link" href="#">
                                <span>Frontière de Kobero</span>
                                <span class="nav-arrow"><i class="fas fa-chevron-right"></i></span>
                            </a>
                            <a class="nav-link" href="#">
                                <span>Frontière de Kanyaru haut</span>
                                <span class="nav-arrow"><i class="fas fa-chevron-right"></i></span>
                            </a>
                            <a class="nav-link" href="#">
                                <span>Frontière Gasenyi Nemba</span>
                                <span class="nav-arrow"><i class="fas fa-chevron-right"></i></span>
                            </a>
                            <a class="nav-link" href="#">
                                <span>Frontière Gatumba</span>
                                <span class="nav-arrow"><i class="fas fa-chevron-right"></i></span>
                            </a>
                        </nav>
                    </div>

                    {{-- Bloc contact --}}
                    <div class="sidebar-contact">
                        <div class="sc-icon"><i class="fas fa-sitemap"></i></div>
                        <h4>Contactez-nous pour toute assistance</h4>
                        <p>Notre équipe est disponible du lundi au vendredi</p>
                        <span class="sc-phone">+257 22 22 97 39</span>
                        <span class="sc-label">Numéro vert gratuit : 203</span>
                    </div>

                    <a href="{{ asset('assets/images/organigramme.png') }}" download class="sidebar-pdf">
                        <i class="fas fa-file-image"></i> Télécharger l'Organigramme
                    </a>

                </aside>

                {{-- ══ CONTENU PRINCIPAL ══ --}}
                <main class="main-content">

                    <h2>Organigramme de l'ABREMA</h2>

                    <p>
                        L'ABREMA est organisée en directions et services spécialisés, chacun dédié à une
                        mission réglementaire précise. L'organigramme ci-dessous illustre la structure
                        hiérarchique et fonctionnelle de l'institution.
                    </p>

                    <div class="info-box">
                        <h3><i class="fas fa-sitemap"></i> Structure organisationnelle</h3>
                        <p>
                            La Direction Générale supervise l'ensemble des directions techniques :
                            Enregistrement, Inspection, Laboratoire, Pharmacovigilance et Administration.
                        </p>
                    </div>

                    <div class="content-section">
                        <div class="organigramme-wrapper">
                            <img src="{{ asset('assets/images/organigramme.png') }}"
                                 alt="Organigramme de l'ABREMA">
                            <div class="organigramme-actions">
                                <a href="{{ asset('assets/images/organigramme.png') }}"
                                   target="_blank" class="btn-primary-page">
                                    <i class="fas fa-expand-alt"></i> Voir en plein écran
                                </a>
                                <a href="{{ asset('assets/images/organigramme.png') }}"
                                   download class="btn-gold-page">
                                    <i class="fas fa-download"></i> Télécharger
                                </a>
                            </div>
                        </div>
                    </div>

                </main>

            </div>
        </div>
    </div>

@endsection