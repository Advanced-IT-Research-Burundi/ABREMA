@extends('layouts.base')

@section('title', 'Équipe de Direction | ')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/pages.css') }}">
    <style>
        /* ── Grille équipe dans le contenu interne ── */
        .team-inner-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 22px;
            margin-top: 10px;
        }

        .team-card {
            background: #fff;
            overflow: hidden;
            border: 1px solid var(--gray-200);
            box-shadow: var(--shadow-sm);
            transition: var(--tr);
        }
        .team-card:hover {
            transform: translateY(-6px);
            box-shadow: var(--shadow);
            border-color: var(--gray-300);
        }

        /* Photo */
        .team-photo {
            width: 100%;
            aspect-ratio: 3 / 4;
            overflow: hidden;
            position: relative;
        }
        .team-photo img {
            width: 100%; height: 100%;
            object-fit: cover;
            transition: transform .5s ease;
            display: block;
        }
        .team-card:hover .team-photo img { transform: scale(1.06); }

        /* Overlay socials */
        .team-photo-overlay {
            position: absolute; inset: 0;
            background: linear-gradient(to top, rgba(13,61,34,.82) 0%, transparent 55%);
            display: flex; align-items: flex-end;
            padding: 18px;
            opacity: 0;
            transition: opacity .3s ease;
        }
        .team-card:hover .team-photo-overlay { opacity: 1; }

        .team-socials { display: flex; gap: 8px; }
        .team-socials a {
            width: 34px; height: 34px;
            background: var(--gold);
            color: #fff;
            display: flex; align-items: center; justify-content: center;
            font-size: 0.84rem;
            transition: var(--tr);
            text-decoration: none;
        }
        .team-socials a:hover { background: #fff; color: var(--green-dark); }

        /* Info */
        .team-info {
            padding: 18px 20px;
            border-top: 2px solid var(--gold);
        }
        .team-info h4 {
            font-family: 'DM Serif Display', serif;
            font-size: 1.05rem;
            color: var(--green-dark);
            font-weight: 400;
            margin-bottom: 4px;
            line-height: 1.3;
        }
        .team-info .role {
            font-size: 0.8rem;
            color: var(--gold);
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .07em;
            display: block;
            margin-bottom: 8px;
        }
        .team-info .description {
            font-size: 0.84rem;
            color: var(--gray-600);
            line-height: 1.6;
            margin-bottom: 10px;
        }
        .team-info .email {
            font-size: 0.82rem;
            color: var(--green);
            display: flex; align-items: center; gap: 6px;
            word-break: break-all;
        }
        .team-info .email i { color: var(--gold); flex-shrink: 0; }

        /* Vide */
        .team-empty {
            grid-column: 1 / -1;
            text-align: center;
            padding: 50px 20px;
            color: var(--gray-400);
            font-size: 0.92rem;
        }
        .team-empty i {
            font-size: 2.5rem;
            display: block;
            margin-bottom: 12px;
            opacity: .35;
        }

        @media (max-width: 1024px) {
            .team-inner-grid { grid-template-columns: repeat(2, 1fr); }
        }
        @media (max-width: 540px) {
            .team-inner-grid { grid-template-columns: 1fr; }
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
            <span class="current">Équipe de Direction</span>
        </div>
        <h1>Équipe de Direction de l'ABREMA</h1>
        <p class="lead">Les professionnels dévoués à la réglementation des produits de santé au Burundi</p>
    </div>

    {{-- ── MAIN LAYOUT ── --}}
    <div class="main-layout">
        <div class="container-fluid">
            <div class="layout-row">

                {{-- ══ SIDEBAR GAUCHE ══ --}}
                <aside class="sidebar-nav">

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

                    <div class="sidebar-contact">
                        <div class="sc-icon"><i class="fas fa-users"></i></div>
                        <h4>Rejoindre notre équipe</h4>
                        <p>Consultez nos offres d'emploi et opportunités de carrière à l'ABREMA</p>
                        <span class="sc-phone">+257 22 22 97 39</span>
                        <span class="sc-label">Numéro vert gratuit : 203</span>
                    </div>

                    <a href="#" class="sidebar-pdf">
                        <i class="fas fa-file-pdf"></i> Organigramme PDF
                    </a>

                </aside>

                {{-- ══ CONTENU PRINCIPAL ══ --}}
                <main class="main-content">

                    <h2>Équipe de Direction de l'ABREMA</h2>
                    <p>
                        L'ABREMA est dirigée par une équipe de professionnels expérimentés et engagés dans la mission
                        de régulation des médicaments et des aliments au Burundi, conformément aux normes internationales.
                    </p>

                    <div class="content-section" style="padding-top: 0; border-top: none;">
                        <div class="team-inner-grid">
                            @forelse($membres as $membre)
                                <div class="team-card">

                                    <div class="team-photo">
                                        <img
                                            src="{{ $membre->photo ? asset('storage/' . $membre->photo) : asset('images/default-user.png') }}"
                                            alt="{{ $membre->nom_prenom }}">
                                        <div class="team-photo-overlay">
                                            <div class="team-socials">
                                                @if($membre->email)
                                                    <a href="mailto:{{ $membre->email }}" title="Email">
                                                        <i class="fas fa-envelope"></i>
                                                    </a>
                                                @endif
                                                <a href="#" title="LinkedIn">
                                                    <i class="fab fa-linkedin-in"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="team-info">
                                        <h4>{{ $membre->nom_prenom }}</h4>
                                        <span class="role">{{ $membre->description }}</span>
                                        @if($membre->email)
                                            <p class="email">
                                                <i class="fas fa-envelope"></i>
                                                {{ $membre->email }}
                                            </p>
                                        @endif
                                    </div>

                                </div>
                            @empty
                                <div class="team-empty">
                                    <i class="fas fa-users"></i>
                                    <p>Aucun membre enregistré pour l'instant.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>

                </main>

            </div>
        </div>
    </div>

@endsection