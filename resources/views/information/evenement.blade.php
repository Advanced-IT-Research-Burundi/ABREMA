@extends('layouts.base')

@section('title', 'Profil de l\'ABREMA')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/pages.css') }}">
@endsection

@section('content')
<!-- PAGE BANNER -->
<div class="page-banner">
    <div class="container-fluid">
        <h1>Les evenements</h1>
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
                    <a class="nav-link active" href="{{ route('about.profilabrema') }}">Profil global d'ABREMA</a>
                    <a class="nav-link" href="{{ route('about.organigramme') }}">Organigramme</a>
                    <a class="nav-link" href="{{ route('about.equipe') }}">Équipe de Direction</a>
                    <a class="nav-link" href="{{ route('about.fonction') }}">Fonction Réglementaire</a>
                    <a class="nav-link" href="{{ route('about.qms') }}">QMS</a>
                </nav>
            </aside>

            <!-- MAIN CONTENT -->
            <main class="main-content">
                <h2>Les Evenements</h2>
                <!-- donnees dynamiques -->
            </main>

            <!-- SIDEBAR WIDGETS -->
            <aside>
                <!-- Avis au public -->
                <div class="widget">
                    <h3>Avis au Public</h3>
                    <p class="text-muted small">Pas d'avis au Public pour le moment</p>
                </div>

                <!-- Services rapides -->
                <div class="widget widget-services">
                    <h3>Services Rapides</h3>
                    <a href="{{ route('importexport.demande') }}" class="service-link">
                        <span>Demande d'importation</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                    <a href="{{ route('colis.index') }}" class="service-link">
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
                    <h3>Points D'Entrees</h3>
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