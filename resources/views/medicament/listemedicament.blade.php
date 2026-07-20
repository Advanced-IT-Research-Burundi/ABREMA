@extends('layouts.base')

@section('title', 'Liste Nationale des Medicaments Essentiels au burundi')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/pages.css') }}">
@endsection

@section('content')
    <!-- PAGE BANNER -->
    <div class="page-banner">
        <div class="container-fluid">
            <h1>Liste Nationale des Medicaments Essentiels au burundi</h1>
            <p class="lead">Autorité Burundaise de Régulation des Médicaments à usage humain et des Aliments</p>
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
                    <div class="page-section">
                        <h2 class="page-section-title">
                           Liste Nationale des Medicaments Essentiels au burundi
                        </h2>
                    </div>
                    <div class="mt-4 text-center">
                        <a href="{{ asset('files/listemedicament.pdf') }}" target="_blank" class="btn btn-outline-primary" style="padding: 12px 25px; border-radius: 10px; text-decoration: none; border: 1px solid #007bff; color: #007bff; display: inline-flex; align-items: center; gap: 10px; font-weight: 600; font-size: 1.1rem;">
                            <i class="fas fa-file-pdf"></i> Consulter la Liste Nationale
                        </a>
                        <a href="{{ asset('files/listemedicament.pdf') }}" download class="btn btn-outline-success" style="padding: 12px 25px; border-radius: 10px; margin-left: 15px; text-decoration: none; border: 1px solid #28a745; color: #28a745; display: inline-flex; align-items: center; gap: 10px; font-weight: 600; font-size: 1.1rem;">
                            <i class="fas fa-download"></i> Télécharger le document
                        </a>
                        <button onclick="copyToClipboard('{{ asset('files/listemedicament.pdf') }}', this)" class="btn btn-outline-info" style="padding: 12px 25px; border-radius: 10px; margin-left: 15px; text-decoration: none; border: 1px solid #17a2b8; color: #17a2b8; display: inline-flex; align-items: center; gap: 10px; font-weight: 600; font-size: 1.1rem; background: transparent;">
                            <i class="fas fa-share-alt"></i> Partager
                        </button>
                    </div>
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
