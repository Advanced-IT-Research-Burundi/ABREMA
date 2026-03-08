@extends('layouts.base')

@section('title', 'Les Événements | ')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/pages.css') }}">
    <style>
        /* ── Cartes événements ── */
        .event-card {
            display: flex; gap: 0;
            border: 1px solid var(--gray-200);
            background: #fff; margin-bottom: 14px;
            overflow: hidden; transition: var(--tr);
        }
        .event-card:hover {
            border-color: var(--green);
            transform: translateY(-2px);
            box-shadow: var(--shadow-sm);
        }

        /* Colonne date */
        .event-date-col {
            width: 72px; flex-shrink: 0;
            background: var(--green-dark);
            display: flex; flex-direction: column;
            align-items: center; justify-content: center;
            padding: 16px 8px;
            border-right: 3px solid var(--gold);
        }
        .event-date-col .ed-day {
            font-family: 'DM Serif Display', serif;
            font-size: 1.9rem; color: #fff;
            line-height: 1; font-weight: 400;
        }
        .event-date-col .ed-month {
            font-size: 0.7rem; font-weight: 700;
            color: var(--gold-light);
            text-transform: uppercase; letter-spacing: .1em;
            margin-top: 4px;
        }
        .event-date-col .ed-year {
            font-size: 0.68rem; color: rgba(255,255,255,.5);
            margin-top: 2px;
        }

        /* Contenu */
        .event-body {
            flex: 1; padding: 18px 22px;
            display: flex; flex-direction: column; justify-content: center;
        }
        .event-body h4 {
            font-family: 'DM Serif Display', serif;
            font-size: 1.1rem; color: var(--text);
            font-weight: 400; line-height: 1.32;
            margin-bottom: 8px; transition: color .2s;
        }
        .event-card:hover .event-body h4 { color: var(--green); }

        .event-body p {
            font-size: 0.88rem; color: var(--gray-600);
            line-height: 1.72; margin: 0; text-align: justify;
        }

        /* Badge icône droite */
        .event-icon-col {
            width: 50px; flex-shrink: 0;
            display: flex; align-items: center; justify-content: center;
            background: var(--gray-50); border-left: 1px solid var(--gray-100);
        }
        .event-icon-col i {
            font-size: 1.15rem; color: var(--gray-300);
            transition: var(--tr);
        }
        .event-card:hover .event-icon-col i { color: var(--gold); }

        /* État vide */
        .event-empty {
            text-align: center; padding: 60px 20px; color: var(--gray-400);
        }
        .event-empty i { font-size: 3rem; display: block; margin-bottom: 16px; opacity: .28; }
        .event-empty h3 {
            font-family: 'DM Serif Display', serif; font-size: 1.2rem;
            color: var(--gray-600); font-weight: 400; margin-bottom: 8px;
        }
        .event-empty p { font-size: 0.88rem; color: var(--gray-400); margin: 0; }
    </style>
@endsection

@section('content')

    {{-- ── PAGE BANNER ── --}}
    <div class="page-banner">
        <div class="banner-breadcrumb">
            <a href="{{ route('home') }}">Accueil</a>
            <i class="fas fa-chevron-right"></i>
            <span class="current">Événements</span>
        </div>
        <h1>Les Événements</h1>
        <p class="lead">Avis au public, annonces et événements officiels de l'ABREMA</p>
    </div>

    {{-- ── MAIN LAYOUT ── --}}
    <div class="main-layout">
        <div class="container-fluid">
            <div class="layout-row">

                {{-- ══ SIDEBAR ══ --}}
                <aside class="sidebar-nav">

                    <div class="nav-block">
                        <nav>
                            <a class="nav-link {{ Route::is('information.actualite') ? 'active' : '' }}"
                               href="{{ route('information.actualite') }}">
                                <span>Actualités</span>
                                <span class="nav-arrow"><i class="fas fa-chevron-right"></i></span>
                            </a>
                            <a class="nav-link {{ Route::is('information.document') ? 'active' : '' }}"
                               href="{{ route('information.document') }}">
                                <span>Documents</span>
                                <span class="nav-arrow"><i class="fas fa-chevron-right"></i></span>
                            </a>
                            <a class="nav-link {{ Route::is('information.evenement') ? 'active' : '' }}"
                               href="{{ route('information.evenement') }}">
                                <span>Événements</span>
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
                        <div class="sc-icon"><i class="fas fa-calendar-alt"></i></div>
                        <h4>Contactez-nous</h4>
                        <p>Pour toute information sur nos événements</p>
                        <span class="sc-phone">+257 22 22 97 39</span>
                        <span class="sc-label">Numéro vert gratuit : 203</span>
                    </div>

                </aside>

                {{-- ══ CONTENU ══ --}}
                <main class="main-content">

                    <h2>Les Événements</h2>
                    <p>Retrouvez ici les avis au public, annonces officielles et événements organisés par l'ABREMA.</p>

                    <div class="content-section" style="border-top: none; padding-top: 0;">

                        @if ($avisPublics->count() === 0)

                            <div class="event-empty">
                                <i class="fas fa-calendar-times"></i>
                                <h3>Aucun événement pour le moment</h3>
                                <p>Revenez régulièrement pour consulter les prochains événements et annonces de l'ABREMA.</p>
                            </div>

                        @else

                            @foreach ($avisPublics as $avis)
                                <div class="event-card">

                                    <div class="event-date-col">
                                        <span class="ed-day">
                                            {{ \Carbon\Carbon::parse($avis->created_at)->format('d') }}
                                        </span>
                                        <span class="ed-month">
                                            {{ \Carbon\Carbon::parse($avis->created_at)->translatedFormat('M') }}
                                        </span>
                                        <span class="ed-year">
                                            {{ \Carbon\Carbon::parse($avis->created_at)->format('Y') }}
                                        </span>
                                    </div>

                                    <div class="event-body">
                                        <h4>{{ $avis->title }}</h4>
                                        @if($avis->description)
                                            <p>{{ Str::limit($avis->description, 200) }}</p>
                                        @endif
                                    </div>

                                    <div class="event-icon-col">
                                        <i class="fas fa-chevron-right"></i>
                                    </div>

                                </div>
                            @endforeach

                            <div style="margin-top: 20px; padding-top: 18px; border-top: 1px solid var(--gray-100);">
                                {{ $avisPublics->links() }}
                            </div>

                        @endif

                    </div>

                </main>

            </div>
        </div>
    </div>

@endsection