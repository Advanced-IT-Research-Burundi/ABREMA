@extends('layouts.base')

@section('title', 'Les Actualités')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/pages.css') }}">
    <style>
        /* STYLES POUR LA LISTE DES ACTUALITÉS */
        .actualites-list {
            display: grid;
            gap: 25px;
        }

        .actualite-card-full {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            display: grid;
            grid-template-columns: 300px 1fr;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .actualite-card-full:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 20px rgba(0,0,0,0.15);
            border-color: var(--abrema-green);
        }

        .actualite-image-full {
            position: relative;
            width: 100%;
            height: 100%;
            min-height: 250px;
            overflow: hidden;
        }

        .actualite-image-full img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .actualite-card-full:hover .actualite-image-full img {
            transform: scale(1.1);
        }

        .actualite-badge-overlay {
            position: absolute;
            top: 15px;
            left: 15px;
            background: var(--abrema-green);
            color: white;
            padding: 8px 16px;
            border-radius: 6px;
            font-weight: 700;
            font-size: 0.85rem;
            box-shadow: 0 2px 8px rgba(0,0,0,0.2);
        }

        .actualite-content-full {
            padding: 30px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .actualite-header-full {
            margin-bottom: 15px;
        }

        .actualite-title-full {
            color: var(--text-dark);
            font-size: 1.6rem;
            font-weight: 700;
            line-height: 1.3;
            margin-bottom: 12px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .actualite-card-full:hover .actualite-title-full {
            color: var(--abrema-green);
        }

        .actualite-excerpt-full {
            color: var(--text-light);
            font-size: 1.05rem;
            line-height: 1.7;
            margin-bottom: 20px;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .actualite-footer-full {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-top: 15px;
            border-top: 1px solid #e9ecef;
        }

        .actualite-meta-full {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .meta-item-full {
            display: flex;
            align-items: center;
            gap: 6px;
            color: var(--text-light);
            font-size: 0.95rem;
        }

        .meta-item-full i {
            color: var(--abrema-green);
        }

        .read-more-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 25px;
            background: var(--abrema-green);
            color: white;
            border-radius: 25px;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }

        .read-more-btn:hover {
            background: var(--abrema-dark-green);
            gap: 12px;
            color: white;
        }

        /* PAGINATION */
        .pagination-wrapper {
            display: flex;
            justify-content: center;
            margin-top: 40px;
        }

        /* EMPTY STATE */
        .empty-state-full {
            text-align: center;
            padding: 80px 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .empty-state-full i {
            font-size: 4rem;
            color: var(--text-light);
            margin-bottom: 20px;
        }

        .empty-state-full h3 {
            color: var(--text-dark);
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .empty-state-full p {
            color: var(--text-light);
            font-size: 1.1rem;
        }

        /* RESPONSIVE */
        @media (max-width: 992px) {
            .actualite-card-full {
                grid-template-columns: 1fr;
            }

            .actualite-image-full {
                height: 250px;
            }
        }

        @media (max-width: 768px) {
            .actualite-content-full {
                padding: 20px;
            }

            .actualite-title-full {
                font-size: 1.3rem;
            }

            .actualite-footer-full {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
        }
    </style>
@endsection

@section('content')
    <!-- PAGE BANNER -->
    <div class="page-banner">
        <div class="container-fluid">
            <h1>Les Actualités</h1>
            <p class="lead">Restez informés de toutes nos actualités et annonces</p>
        </div>
    </div>

    <!-- MAIN LAYOUT -->
    <div class="main-layout">
        <div class="container-fluid">
            <div class="layout-row">

                <!-- SIDEBAR NAV -->
                <aside class="sidebar-nav">
                    <h3>Navigation</h3>
                    <nav class="nav flex-column">
                        <a class="nav-link" href="{{ route('about.profilabrema') }}">Profil global d'ABREMA</a>
                        <a class="nav-link" href="{{ route('about.organigramme') }}">Organigramme</a>
                        <a class="nav-link" href="{{ route('about.equipe') }}">Équipe de Direction</a>
                        <a class="nav-link" href="{{ route('about.fonction') }}">Fonction Réglementaire</a>
                        <a class="nav-link" href="{{ route('about.qms') }}">QMS</a>
                        <a class="nav-link active" href="{{ route('information.actualite') }}">Actualités</a>
                        <a class="nav-link" href="{{ route('information.document') }}">Documents</a>
                    </nav>
                </aside>

                <!-- MAIN CONTENT -->
                <main class="main-content">
                    <div class="section-header" style="text-align: left; margin-bottom: 30px;">
                        <h2 style="font-size: 2rem; color: var(--text-dark); margin-bottom: 10px;">
                            Toutes les Actualités
                        </h2>
                        <p style="color: var(--text-light); font-size: 1.1rem;">
                            {{ $actualites->total() }} actualité(s) trouvée(s)
                        </p>
                    </div>

                    <!-- LISTE DES ACTUALITÉS -->
                    <div class="actualites-list">
                        @forelse($actualites as $actualite)
                            <div class="actualite-card-full">
                                <div class="actualite-image-full">
                                    <img src="{{ asset('storage/' . $actualite->image) }}" alt="{{ $actualite->title }}">
                                    <div class="actualite-badge-overlay">
                                        {{ $actualite->created_at->format('d M Y') }}
                                    </div>
                                </div>
                                
                                <div class="actualite-content-full">
                                    <div>
                                        <div class="actualite-header-full">
                                            <h3 class="actualite-title-full">{{ $actualite->title }}</h3>
                                        </div>
                                        
                                        <p class="actualite-excerpt-full">
                                            {{ $actualite->description }}
                                        </p>
                                    </div>
                                    
                                    <div class="actualite-footer-full">
                                        <div class="actualite-meta-full">
                                            <div class="meta-item-full">
                                                <i class="far fa-calendar-alt"></i>
                                                <span>{{ $actualite->created_at->format('d M Y') }}</span>
                                            </div>
                                            <div class="meta-item-full">
                                                <i class="far fa-clock"></i>
                                                <span>{{ $actualite->created_at->diffForHumans() }}</span>
                                            </div>
                                        </div>
                                        
                                        <a href="{{ route('actualite.show', $actualite->id) }}" class="read-more-btn">
                                            Lire la suite
                                            <i class="fas fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="empty-state-full">
                                <i class="fas fa-newspaper"></i>
                                <h3>Aucune actualité disponible</h3>
                                <p>Il n'y a pas d'actualités pour le moment. Revenez bientôt !</p>
                            </div>
                        @endforelse
                    </div>

                    <!-- PAGINATION -->
                    @if($actualites->hasPages())
                        <div class="pagination-wrapper">
                            {{ $actualites->links() }}
                        </div>
                    @endif
                </main>

                <!-- SIDEBAR WIDGETS -->
                <aside>
                    <!-- Avis au public -->
                    <div class="widget">
                        <h3>Avis au Public</h3>

                        @if ($avisPublics->count() == 0)
                            <p class="text-muted small">Pas d'avis au Public pour le moment</p>
                        @else
                            <ul class="list-unstyled">
                                @foreach ($avisPublics as $avis)
                                    <li style="margin-bottom: 12px;">
                                        <strong>{{ $avis->title }}</strong>
                                        <br>

                                        <a href="{{ route('information.evenement') }}" class="btn btn-link p-0"
                                            style="font-size: 0.9rem;">
                                            Lire plus →
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>

                    <!-- Services rapides -->
                    <div class="widget widget-services">
                        <h3>Services Rapides</h3>
                        <a href="{{ route('importexport.demande') }}" class="service-link">
                            <span>Demande d'importation</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                        <a href="{{ route('submitcolis') }}" class="service-link">
                            <span>Inspection des colis</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                        <a href="{{ route('vigilance.signalement') }}" class="service-link">
                            <span>Signalement PMQIF</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                        <a href="{{ route('vigilance.delegue') }}" class="service-link">
                            <span>Délégués médicaux</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>

                    <!-- Liens officiels -->
                    <div class="widget widget-links">
                        <h3>Points d'entrée</h3>
                        <a href="#">Aéroport international Melchior Ndadaye</a>
                        <a href="#">Port de Bujumbura</a>
                        <a href="#">Frontière de Kobero</a>
                        <a href="#">Frontière de Kanyaru haut</a>
                        <a href="#">Frontière Gasenyi Nemba</a>
                        <a href="#">Frontière Gatumba</a>
                    </div>
                </aside>

            </div>
        </div>
    </div>
@endsection