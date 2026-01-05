@extends('layouts.base')

@section('title', 'Profil de l\'ABREMA')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/pages.css') }}">
    <style>
        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }

        .moder-team-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid rgba(0, 0, 0, 0.03);
            display: flex;
            flex-direction: column;
            height: 100%;
            position: relative;
        }

        .moder-team-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .team-photo-wrapper {
            width: 100%;
            aspect-ratio: 4 / 5;
            overflow: hidden;
            position: relative;
        }

        .team-photo-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .moder-team-card:hover .team-photo-wrapper img {
            transform: scale(1.08);
        }

        .team-card-body {
            padding: 25px;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
            background: linear-gradient(to bottom, #ffffff, #fafafa);
        }

        .team-role {
            font-size: 0.85rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: var(--primary-color);
            margin-bottom: 8px;
            display: block;
        }

        .team-name {
            font-size: 1.25rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 12px;
            line-height: 1.2;
        }

        .team-bio {
            font-size: 0.95rem;
            color: #64748b;
            line-height: 1.6;
            margin-bottom: 20px;
            flex-grow: 1;
        }

        .team-contact {
            padding-top: 15px;
            border-top: 1px solid #f1f5f9;
            display: flex;
            align-items: center;
            gap: 10px;
            color: #475569;
            font-size: 0.9rem;
            text-decoration: none;
            transition: color 0.2s;
        }

        .team-contact:hover {
            color: var(--primary-color);
        }

        .team-contact i {
            font-size: 1rem;
            opacity: 0.7;
        }

        @media (max-width: 640px) {
            .team-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }
        }
    </style>
@endsection

@section('content')
    <!-- PAGE BANNER -->
    <div class="page-banner">
        <div class="container-fluid">
            <h1>Équipe de Direction de l'ABREMA</h1>
            <p class="lead">Le leadership engagé au service de la santé publique au Burundi</p>
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
                        <a class="nav-link {{ Route::is('about.profilabrema') ? 'active' : '' }}" href="{{ route('about.profilabrema') }}">Profil global d'ABREMA</a>
                        <a class="nav-link {{ Route::is('about.organigramme') ? 'active' : '' }}" href="{{ route('about.organigramme') }}">Organigramme</a>
                        <a class="nav-link {{ Route::is('about.equipe') ? 'active' : '' }}" href="{{ route('about.equipe') }}">Équipe de Direction de l'ABREMA</a>
                        <a class="nav-link {{ Route::is('about.fonction') ? 'active' : '' }}" href="{{ route('about.fonction') }}">Fonction Réglementaire</a>
                        <a class="nav-link {{ Route::is('about.qms') ? 'active' : '' }}" href="{{ route('about.qms') }}">QMS</a>
                    </nav>
                </aside>

                <!-- MAIN CONTENT -->
                <main class="main-content">
                    <div class="page-header">
                        <h2>Équipe de Direction de l'ABREMA</h2>
                        <p class="section-desc">Nos experts et dirigeants travaillent ensemble pour assurer la qualité et l'accessibilité des produits de santé.</p>
                    </div>

                    <div class="team-grid">
                        @forelse($membres as $membre)
                            <div class="moder-team-card">
                                <div class="team-photo-wrapper">
                                    <img src="{{ $membre->photo ? asset('storage/' . $membre->photo) : asset('images/default-user.png') }}"
                                        alt="{{ $membre->nom_prenom }}">
                                </div>

                                <div class="team-card-body">
                                    <span class="team-role">{{ $membre->description }}</span>
                                    <h4 class="team-name">{{ $membre->nom_prenom }}</h4>
                                    
                                    @if($membre->email)
                                        <a href="mailto:{{ $membre->email }}" class="team-contact">
                                            <i class="fas fa-envelope"></i>
                                            {{ $membre->email }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        @empty
                            <div class="empty-state">
                                <i class="fas fa-users-slash"></i>
                                <p>Aucun membre enregistré pour l’instant.</p>
                            </div>
                        @endforelse
                    </div>
                </main>

                <!-- SIDEBAR WIDGETS -->
                <aside>
                    <!-- Avis au public -->
                    <div class="widget widget-services">
                        <h3>Avis au Public</h3>

                        @if ($avisPublics->count() == 0)
                            <p class="text-muted small">Pas d'avis au Public pour le moment</p>
                        @else
                            <ul class="list-unstyled">
                                @foreach ($avisPublics as $avis)
                                    <li style="margin-bottom: 12px;">
                                        <strong>{{ $avis->title }}</strong>
                                        <br>

                                        <a href="{{ route('information.evenement') }}" class="p-0 btn btn-link"
                                            style="font-size: 0.8rem;">
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
                        </a>
                        <a href="{{ route('submitcolis') }}" class="service-link">
                            <span>Inspection des colis</span>

                        </a>
                        <a href="{{ route('vigilance.signalement') }}" class="service-link">
                            <span>Signalement PMQIF</span>
                        </a>
                        <a href="{{ route('vigilance.delegue') }}" class="service-link">
                            <span>Délégués médicaux</span>
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
