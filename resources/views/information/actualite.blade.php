@extends('layouts.base')

@section('title', 'Les Actualités | ')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/pages.css') }}">
    <style>
        /* ── Cartes actualités ── */
        .actualites-list { display: flex; flex-direction: column; gap: 18px; }

        .actu-card {
            display: grid;
            grid-template-columns: 260px 1fr;
            border: 1px solid var(--gray-200);
            background: #fff;
            overflow: hidden;
            transition: var(--tr);
        }
        .actu-card:hover {
            border-color: var(--green);
            transform: translateY(-3px);
            box-shadow: var(--shadow);
        }

        /* Image */
        .actu-img {
            position: relative;
            overflow: hidden;
        }
        .actu-img img {
            width: 100%; height: 100%;
            object-fit: cover; display: block;
            transition: transform .45s ease;
        }
        .actu-card:hover .actu-img img { transform: scale(1.06); }

        .actu-date-badge {
            position: absolute; top: 14px; left: 14px;
            background: var(--green-dark);
            color: #fff;
            padding: 5px 12px;
            font-size: 0.78rem; font-weight: 700;
            letter-spacing: .04em;
            border-left: 3px solid var(--gold);
        }

        /* Contenu */
        .actu-body {
            padding: 22px 26px;
            display: flex; flex-direction: column; justify-content: space-between;
        }

        .actu-body h3 {
            font-family: 'DM Serif Display', serif;
            font-size: 1.2rem; color: var(--text);
            font-weight: 400; line-height: 1.32;
            margin-bottom: 10px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            transition: color .2s;
        }
        .actu-card:hover .actu-body h3 { color: var(--green); }

        .actu-body p {
            font-size: 0.89rem; color: var(--gray-600);
            line-height: 1.78; margin-bottom: 16px;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-align: justify;
            flex: 1;
        }

        .actu-footer {
            display: flex; align-items: center;
            justify-content: space-between;
            padding-top: 14px;
            border-top: 1px solid var(--gray-100);
        }

        .actu-meta {
            display: flex; align-items: center; gap: 16px;
        }
        .actu-meta span {
            display: flex; align-items: center; gap: 5px;
            font-size: 0.8rem; color: var(--gray-400);
        }
        .actu-meta span i { color: var(--gold); font-size: 0.75rem; }

        .actu-read-btn {
            display: inline-flex; align-items: center; gap: 7px;
            padding: 8px 20px;
            background: var(--green-dark); color: #fff;
            font-size: 0.83rem; font-weight: 600;
            text-decoration: none; transition: var(--tr);
            white-space: nowrap;
        }
        .actu-read-btn:hover { background: var(--green); gap: 10px; color: #fff; }

        /* Compteur */
        .actu-count {
            font-size: 0.88rem; color: var(--gray-400);
            margin-bottom: 18px;
            display: flex; align-items: center; gap: 7px;
        }
        .actu-count i { color: var(--gold); }

        /* État vide */
        .actu-empty {
            text-align: center; padding: 60px 20px;
            color: var(--gray-400);
        }
        .actu-empty i {
            font-size: 3rem; display: block;
            margin-bottom: 16px; opacity: .28;
        }
        .actu-empty h3 {
            font-family: 'DM Serif Display', serif;
            font-size: 1.2rem; color: var(--gray-600);
            font-weight: 400; margin-bottom: 8px;
        }
        .actu-empty p { font-size: 0.88rem; color: var(--gray-400); margin: 0; }

        /* Pagination */
        .actu-pagination {
            margin-top: 28px; padding-top: 20px;
            border-top: 1px solid var(--gray-100);
        }
        .actu-pagination .pagination {
            display: flex; gap: 4px; flex-wrap: wrap;
        }
        .actu-pagination .page-item .page-link {
            display: flex; align-items: center; justify-content: center;
            width: 36px; height: 36px;
            border: 1.5px solid var(--gray-200);
            color: var(--gray-600); font-size: 0.84rem; font-weight: 600;
            text-decoration: none; transition: var(--tr);
            background: #fff;
        }
        .actu-pagination .page-item .page-link:hover,
        .actu-pagination .page-item.active .page-link {
            background: var(--green-dark); color: #fff; border-color: var(--green-dark);
        }

        @media (max-width: 820px) {
            .actu-card { grid-template-columns: 1fr; }
            .actu-img { height: 200px; }
        }
    </style>
@endsection

@section('content')

    {{-- ── PAGE BANNER ── --}}
    <div class="page-banner">
        <div class="banner-breadcrumb">
            <a href="{{ route('home') }}">Accueil</a>
            <i class="fas fa-chevron-right"></i>
            <span class="current">Actualités</span>
        </div>
        <h1>Les Actualités</h1>
        <p class="lead">Restez informés de toutes les activités et annonces de l'ABREMA</p>
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
                        <div class="sc-icon"><i class="fas fa-newspaper"></i></div>
                        <h4>Abonnez-vous aux actualités</h4>
                        <p>Recevez nos dernières informations directement</p>
                        <span class="sc-phone">+257 22 22 97 39</span>
                        <span class="sc-label">Numéro vert gratuit : 203</span>
                    </div>

                </aside>

                {{-- ══ CONTENU ══ --}}
                <main class="main-content">

                    <h2>Toutes les Actualités</h2>

                    <p class="actu-count">
                        <i class="fas fa-layer-group"></i>
                        {{ $actualites->total() }} actualité(s) trouvée(s)
                    </p>

                    <div class="actualites-list">
                        @forelse($actualites as $actualite)

                            <div class="actu-card">
                                <div class="actu-img">
                                    <img src="{{ asset('storage/' . $actualite->image) }}"
                                         alt="{{ $actualite->title }}">
                                    <span class="actu-date-badge">
                                        {{ $actualite->created_at->format('d M Y') }}
                                    </span>
                                </div>

                                <div class="actu-body">
                                    <div>
                                        <h3>{{ $actualite->title }}</h3>
                                        <p>{{ $actualite->description }}</p>
                                    </div>
                                    <div class="actu-footer">
                                        <div class="actu-meta">
                                            <span>
                                                <i class="far fa-calendar-alt"></i>
                                                {{ $actualite->created_at->format('d/m/Y') }}
                                            </span>
                                            <span>
                                                <i class="far fa-clock"></i>
                                                {{ $actualite->created_at->diffForHumans() }}
                                            </span>
                                        </div>
                                        <a href="{{ route('actualite.show', $actualite->id) }}"
                                           class="actu-read-btn">
                                            Lire la suite <i class="fas fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        @empty

                            <div class="actu-empty">
                                <i class="fas fa-newspaper"></i>
                                <h3>Aucune actualité disponible</h3>
                                <p>Il n'y a pas d'actualités pour le moment. Revenez bientôt !</p>
                            </div>

                        @endforelse
                    </div>

                    {{-- Pagination --}}
                    @if($actualites->hasPages())
                        <div class="actu-pagination">
                            {{ $actualites->links() }}
                        </div>
                    @endif

                </main>

            </div>
        </div>
    </div>

@endsection