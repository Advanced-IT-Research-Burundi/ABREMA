@extends('layouts.base')

@section('title', 'Profil de l\'ABREMA')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/pages.css') }}">
@endsection

@section('content')
    <!-- PAGE BANNER -->
    <div class="page-banner">
        <div class="container-fluid">
            <h1>À propos de l'ABREMA</h1>
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
                    <h2>À propos de l'ABREMA</h2>

                    <p>
                        L'Autorité Burundaise de Régulation des Médicaments à usage humain et des Aliments « ABREMA » en
                        sigle, est une
                        administration personnalisée de l'État placée sous la tutelle du ministère ayant la santé publique
                        dans ses attributions.
                    </p>

                    <p>
                        L'ABREMA est régie par la loi N°1/11 du 08 Mai 2020 portant Réglementation de l'exercice de la
                        Pharmacie et du
                        Médicament à usage humain, et a été créé en 2021 par le décret N° 100/039 du 26 Février 2021 portant
                        création,
                        organisation et fonctionnement de l'Autorité Burundaise de Régulation des Médicaments à usage humain
                        et des Aliments
                        « ABREMA ».
                    </p>

                    <p>
                        L'ABREMA a pour objectif général de protéger la santé publique par la promotion de la qualité et la
                        sécurité
                        des médicaments et des aliments sur le territoire burundais.
                    </p>

                    <div class="info-box">
                        <h3><i class="fas fa-bullseye"></i> Mission principale</h3>
                        <p>
                            Garantir l'accès à des médicaments de qualité, sûrs et efficaces pour tous les citoyens
                            burundais.
                        </p>
                    </div>

                    <h3>Nos Valeurs</h3>
                    <ul>
                        <li>Excellence dans la régulation pharmaceutique</li>
                        <li>Transparence et intégrité</li>
                        <li>Protection de la santé publique</li>
                        <li>Innovation et amélioration continue</li>
                        <li>Collaboration avec les parties prenantes</li>
                    </ul>
                    <div class="info-box">
                        <h3><i class="fas fa-bullseye"></i> Engagement</h3>
                        <p>
                            ABREMA s’engage à offrir des services de réglementation pharmaceutique de
                            qualité dans la poursuite de la protection de la santé publique et en faisant appel à un
                            personnel compétent et dévoué ainsi qu’aux technologies adaptées
                        </p>
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
