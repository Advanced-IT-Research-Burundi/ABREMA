@extends('layouts.base')

@section('title', 'Inspection des Établissements | ')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/pages.css') }}">
@endsection

@section('content')

    {{-- ── PAGE BANNER ── --}}
    <div class="page-banner">
        <div class="banner-breadcrumb">
            <a href="{{ route('home') }}">Accueil</a>
            <i class="fas fa-chevron-right"></i>
            <span class="current">Inspection des Établissements</span>
        </div>
        <h1>Inspection des Établissements</h1>
        <p class="lead">Contrôle de la conformité des établissements pharmaceutiques au Burundi</p>
    </div>

    {{-- ── MAIN LAYOUT ── --}}
    <div class="main-layout">
        <div class="container-fluid">
            <div class="layout-row">

                {{-- ══ SIDEBAR ══ --}}
                <aside class="sidebar-nav">

                    <div class="nav-block">
                        <nav>
                            <a class="nav-link {{ Route::is('inspection.etablissement') ? 'active' : '' }}"
                               href="{{ route('inspection.etablissement') }}">
                                <span>Établissements</span>
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
                        <div class="sc-icon"><i class="fas fa-headset"></i></div>
                        <h4>Besoin d'assistance ?</h4>
                        <p>Contactez notre service d'inspection</p>
                        <span class="sc-phone">+257 22 22 97 39</span>
                        <span class="sc-label">Numéro vert gratuit : 203</span>
                    </div>

                </aside>

                {{-- ══ CONTENU ══ --}}
                <main class="main-content">

                    <h2>Inspection des Établissements</h2>

                    <p>
                        L'ABREMA effectue des inspections réglementaires dans les usines pharmaceutiques,
                        les établissements de vente en gros et en détail des médicaments, des dispositifs
                        médicaux et des autres produits de santé.
                    </p>

                    <div class="info-box">
                        <h3><i class="fas fa-search"></i> Objectif des inspections</h3>
                        <p>
                            Garantir que tous les établissements pharmaceutiques respectent les Bonnes Pratiques
                            de Fabrication (BPF), de Distribution (BPD) et de Pharmacie (BPP) conformément
                            aux normes OMS et EAC.
                        </p>
                    </div>

                    <div class="content-section">
                        <h3>Types d'établissements inspectés</h3>
                        <div class="feat-grid">
                            <div class="feat-card">
                                <div class="feat-icon"><i class="fas fa-industry"></i></div>
                                <div>
                                    <h4>Usines Pharmaceutiques</h4>
                                    <p>Vérification des Bonnes Pratiques de Fabrication (BPF) et conformité des lignes de production.</p>
                                </div>
                            </div>
                            <div class="feat-card">
                                <div class="feat-icon"><i class="fas fa-warehouse"></i></div>
                                <div>
                                    <h4>Grossistes en Médicaments</h4>
                                    <p>Contrôle des conditions de stockage et de distribution en conformité aux BPD.</p>
                                </div>
                            </div>
                            <div class="feat-card">
                                <div class="feat-icon"><i class="fas fa-prescription-bottle-alt"></i></div>
                                <div>
                                    <h4>Pharmacies de Détail</h4>
                                    <p>Inspection des pharmacies pour s'assurer de la conformité aux Bonnes Pratiques de Pharmacie.</p>
                                </div>
                            </div>
                            <div class="feat-card">
                                <div class="feat-icon"><i class="fas fa-heartbeat"></i></div>
                                <div>
                                    <h4>Dispositifs Médicaux</h4>
                                    <p>Contrôle des établissements distributeurs de dispositifs médicaux et équipements de santé.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Processus d'inspection</h3>
                        <ul>
                            <li>Notification préalable à l'établissement concerné</li>
                            <li>Visite sur site par les officiers inspecteurs accrédités</li>
                            <li>Vérification des dossiers, équipements et procédures</li>
                            <li>Rédaction d'un rapport d'inspection détaillé</li>
                            <li>Délivrance ou renouvellement de la licence selon les résultats</li>
                            <li>Suivi des mesures correctives en cas de non-conformité</li>
                        </ul>
                    </div>

                    <div class="alert-box">
                        <h3><i class="fas fa-exclamation-circle"></i> Important</h3>
                        <p>
                            Tout établissement pharmaceutique exerçant sur le territoire burundais doit
                            être enregistré auprès de l'ABREMA et obtenir une licence valide avant toute activité.
                            Le non-respect de cette obligation est passible de sanctions réglementaires.
                        </p>
                    </div>

                </main>

            </div>
        </div>
    </div>

@endsection