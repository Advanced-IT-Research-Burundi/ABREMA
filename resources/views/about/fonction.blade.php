@extends('layouts.base')

@section('title', 'Profil de l\'ABREMA')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/pages.css') }}">
@endsection

@section('content')
    <!-- PAGE BANNER -->
    <div class="page-banner">
        <div class="container-fluid">
            <h1>Fonctions reglementaires de l'ABREMA</h1>
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
                        <a class="nav-link {{ Route::is('about.equipe') ? 'active' : '' }}" href="{{ route('about.equipe') }}">Équipe de Direction</a>
                        <a class="nav-link {{ Route::is('about.fonction') ? 'active' : '' }}" href="{{ route('about.fonction') }}">Fonction Réglementaire</a>
                        <a class="nav-link {{ Route::is('about.qms') ? 'active' : '' }}" href="{{ route('about.qms') }}">QMS</a>
                    </nav>
                </aside>

                <!-- MAIN CONTENT -->
                <main class="main-content">
                    <h2>Fonctions reglementaires de l'ABREMA</h2>

                    <div class="page-section">
                        <ul class="page-list">
                            <li>
                                <strong>Enregistrement / Homologation :</strong> Évaluation scientifique des dossiers pour
                                l'autorisation
                                de mise sur le marché des produits.
                            </li>

                            <li>
                                <strong>Inspection des établissements pharmaceutiques :</strong> Vérification de la
                                conformité aux
                                bonnes
                                pratiques de fabrication, de distribution et de pharmacie.
                            </li>

                            <li>
                                <strong>Pharmacovigilance :</strong> Surveillance des effets indésirables des médicaments
                                après leur
                                mise
                                sur le marché.
                            </li>

                            <li>
                                <strong>Régulation de la publicité et de la promotion des produits de santé :</strong>
                                Contrôle des
                                messages publicitaires pour assurer leur véracité et leur conformité.
                            </li>

                            <li>
                                <strong>Contrôle de la qualité des produits de santé :</strong> Analyse et tests en
                                laboratoire pour
                                garantir la qualité des produits.
                            </li>

                            <li>
                                <strong>Essais cliniques :</strong> Évaluation des protocoles d'essais cliniques pour
                                assurer la
                                sécurité
                                des participants.
                            </li>

                            <li>
                                <strong>Octroi des licences aux établissements pharmaceutiques :</strong> Autorisation des
                                pharmacies,
                                grossistes et fabricants.
                            </li>

                            <li>
                                <strong>Contrôle des importations et exportations des produits de santé :</strong>
                                Surveillance des flux
                                transfrontaliers pour prévenir l'entrée de produits non conformes.
                            </li>

                            <li>
                                <strong>Libération des lots pour les vaccins :</strong> Inspection et approbation des lots
                                de vaccins
                                avant
                                leur distribution.
                            </li>
                        </ul>

                        <p class="page-text">
                            Grâce à ces fonctions, l'ABREMA s'engage à protéger la santé publique en assurant que seuls des
                            produits
                            sûrs,
                            efficaces et de haute qualité sont disponibles sur le marché burundais.
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
