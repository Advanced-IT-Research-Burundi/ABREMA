@extends('layouts.base')

@section('title', 'Avis au Public | ')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/pages.css') }}">
@endsection

@section('content')

    {{-- ── PAGE BANNER ── --}}
    <div class="page-banner">
        <div class="banner-breadcrumb">
            <a href="{{ route('home') }}">Accueil</a>
            <i class="fas fa-chevron-right"></i>
            <span class="current">Avis au Public</span>
        </div>
        <h1>Avis au Public</h1>
        <p class="lead">Informations et annonces importantes de l'Autorité Burundaise de Régulation des Médicaments et des Aliments</p>
    </div>

    {{-- ── MAIN LAYOUT ── --}}
    <div class="main-layout">
        <div class="container-fluid">
            <div class="layout-row">

                {{-- ══ SIDEBAR GAUCHE ══ --}}
                <aside class="sidebar-nav">

                    {{-- Navigation À Propos --}}
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
                            <a class="nav-link" href="{{ route('colis.index') }}">
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
                        <div class="sc-icon"><i class="fas fa-headset"></i></div>
                        <h4>Contactez-nous pour toute assistance</h4>
                        <p>Notre équipe est disponible du lundi au vendredi</p>
                        <span class="sc-phone">+257 22 22 97 39</span>
                        <span class="sc-label">Numéro vert gratuit : 203</span>
                    </div>

                </aside>

                {{-- ══ CONTENU PRINCIPAL ══ --}}
                <main class="main-content">

                    <h2>Avis au Public</h2>

                    <p>
                        Bienvenue sur la page des avis au public. Ici, vous trouverez les dernières
                        informations et annonces importantes concernant nos services et activités.
                    </p>

                    <div class="content-section" style="border-top: none; padding-top: 0;">

                        @forelse($avisPublics as $avis)

                            <div class="avis-item">
                                <div class="avis-header">
                                    <div class="avis-icon">
                                        <i class="fas fa-bullhorn"></i>
                                    </div>
                                    <div class="avis-meta">
                                        <h4>{{ $avis->title }}</h4>
                                        <span class="avis-date">
                                            <i class="fas fa-calendar-alt"></i>
                                            {{ \Carbon\Carbon::parse($avis->created_at)->format('d/m/Y') }}
                                        </span>
                                    </div>
                                    <span class="avis-badge">Nouveau</span>
                                </div>
                                @if($avis->description ?? null)
                                    <div class="avis-body">
                                        <p>{{ $avis->description }}</p>
                                    </div>
                                @endif
                                <div class="avis-footer">
                                    <a href="{{ route('information.evenement') }}" class="btn-primary-page" style="padding: 8px 18px; font-size: 0.82rem;">
                                        <i class="fas fa-arrow-right"></i> Lire la suite
                                    </a>
                                </div>
                            </div>

                        @empty

                            <div class="avis-empty">
                                <i class="fas fa-bell-slash"></i>
                                <h3>Aucun avis au public pour le moment</h3>
                                <p>Revenez régulièrement pour consulter les nouvelles annonces de l'ABREMA.</p>
                            </div>

                        @endforelse

                    </div>

                </main>

            </div>
        </div>
    </div>

@endsection

@section('scripts')
<style>
    /* ── Avis items ── */
    .avis-item {
        border: 1px solid var(--gray-200);
        margin-bottom: 16px;
        background: #fff;
        transition: var(--tr);
        overflow: hidden;
    }
    .avis-item:hover {
        border-color: var(--green);
        box-shadow: var(--shadow-sm);
        transform: translateY(-2px);
    }
    .avis-header {
        display: flex;
        align-items: flex-start;
        gap: 14px;
        padding: 18px 20px 14px;
        border-bottom: 1px solid var(--gray-100);
    }
    .avis-icon {
        width: 42px; height: 42px;
        background: var(--green-pale);
        color: var(--green);
        display: flex; align-items: center; justify-content: center;
        font-size: 1.1rem;
        flex-shrink: 0;
        transition: var(--tr);
    }
    .avis-item:hover .avis-icon {
        background: var(--green);
        color: #fff;
    }
    .avis-meta { flex: 1; }
    .avis-meta h4 {
        font-family: 'Poppins', sans-serif;
        font-size: 0.96rem;
        font-weight: 600;
        color: var(--text);
        margin-bottom: 4px;
        line-height: 1.35;
    }
    .avis-date {
        font-size: 0.79rem;
        color: var(--gray-400);
        display: flex; align-items: center; gap: 5px;
    }
    .avis-date i { color: var(--gold); font-size: 0.75rem; }
    .avis-badge {
        background: var(--gold);
        color: #fff;
        font-size: 0.72rem;
        font-weight: 700;
        padding: 3px 10px;
        text-transform: uppercase;
        letter-spacing: .08em;
        flex-shrink: 0;
        align-self: flex-start;
    }
    .avis-body {
        padding: 14px 20px;
        border-bottom: 1px solid var(--gray-100);
    }
    .avis-body p {
        font-size: 0.9rem;
        color: var(--gray-600);
        line-height: 1.78;
        margin: 0;
        text-align: justify;
    }
    .avis-footer {
        padding: 12px 20px;
        background: var(--gray-50);
    }

    /* ── État vide ── */
    .avis-empty {
        text-align: center;
        padding: 60px 20px;
        color: var(--gray-400);
    }
    .avis-empty i {
        font-size: 3rem;
        display: block;
        margin-bottom: 16px;
        opacity: .3;
    }
    .avis-empty h3 {
        font-family: 'DM Serif Display', serif;
        font-size: 1.2rem;
        color: var(--gray-600);
        font-weight: 400;
        margin-bottom: 8px;
    }
    .avis-empty p {
        font-size: 0.88rem;
        color: var(--gray-400);
        margin: 0;
    }
</style>
@endsection